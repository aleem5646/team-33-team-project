#!/usr/bin/env bash
set -euo pipefail

REMOTE=origin
INTEGRATION=integration/merge-all-features
BRANCHES=(
  "About" "Basket" "Contact" "Homepage" "brand-styles" "checkout"
  "feat/returns-backend" "feature/add-user-role" "feature/product-review"
  "feature/service-review" "features/database" "features/user-profile-dropdown"
  "login+registerauth" "product-detail" "product-listing" "returns"
  "service-review"
)

echo "Fetching remote..."
git fetch "$REMOTE"

echo "Checking out integration branch..."
git checkout "$INTEGRATION"
git reset --hard "$REMOTE/$INTEGRATION"

for b in "${BRANCHES[@]}"; do
  echo
  echo "=== Merging $b into $INTEGRATION ==="
  git fetch "$REMOTE" "$b":"refs/remotes/$REMOTE/$b" || { echo "Failed to fetch $b"; exit 1; }

  if git merge --no-ff --no-edit "$REMOTE/$b"; then
    echo "Merged $b cleanly."
    # Optional: run tests here; abort on failure:
    # ./run-tests.sh || { echo "Tests failed after merging $b"; exit 1; }
  else
    echo "Conflict detected while merging $b."
    CONFLICTS=$(git diff --name-only --diff-filter=U || true)
    echo "Conflicted files:"
    echo "$CONFLICTS"

    git merge --abort || true

    SNAP="${INTEGRATION}-conflict-${b//\//-}"
    echo "Creating snapshot branch: $SNAP"
    git checkout -b "$SNAP" "$REMOTE/$INTEGRATION"

    REPORT="CONFLICTS-${b//\//-}.txt"
    {
      echo "Conflict report for merging branch: $b"
      echo "Time: $(date --utc +%Y-%m-%dT%H:%M:%SZ)"
      echo
      echo "Conflicted files:"
      echo "$CONFLICTS"
      echo
      echo "How to proceed:"
      echo "- Check out this snapshot branch locally: git fetch $REMOTE && git checkout $SNAP"
      echo "- Perform the merge locally and resolve conflicts: git merge $REMOTE/$b"
      echo "- Commit resolved files and push the branch or open a PR to development once resolved."
    } > "$REPORT"

    git add "$REPORT"
    git commit -m "WIP: conflict report for merging $b into $INTEGRATION"
    git push -u "$REMOTE" "$SNAP"

    echo "Pushed snapshot branch: $REMOTE/$SNAP"
    echo "Stopped merge run. Resolve conflicts on $REMOTE/$SNAP or locally, then re-run as needed."
    exit 2
  fi
done

echo "All branches merged cleanly into $INTEGRATION. Pushing..."
git push -u "$REMOTE" "$INTEGRATION"

echo "All done. Create a PR from $INTEGRATION -> development (you can use the GitHub UI or gh CLI)."
echo "Example gh CLI command to create the PR:"
echo "gh pr create --base development --head $INTEGRATION --title \"Merge feature branches into development\" --body \"Integration branch merging multiple feature branches. Run CI and merge with rebase.\""