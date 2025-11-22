@extends('customer-layout')
@section('title','Return Item')

@section('content')
<style>
    .container { max-width: 900px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; }
    h1 { margin-bottom: 10px; }
    form { 
        background: #f9f9f9; 
        padding: 20px; 
        border-radius: 8px; 
        margin-bottom: 30px; 
        display: flex; 
        justify-content: space-between; 
        gap: 20px;
    }
    .form-left { flex: 2; }
    .form-right { 
        flex: 1; 
        background: #dee1d4; 
        border: 1px solid #ccc; 
        border-radius: 8px; 
        padding: 20px; 
        box-shadow: 0 2px 6px rgba(0,0,0,0.1); 
        min-height: 250px; /* bigger box for picture */
        display: flex; 
        flex-direction: column; 
        align-items: center; 
        justify-content: center;
    }
    .form-right label {
    margin-bottom: 15px;
}
    label { display: block; margin-top: 15px; font-weight: bold; }
    input[type="text"], textarea { width: 100%; padding: 10px; margin-top: 5px; border: 1px solid #ccc; border-radius: 5px; }
    input[type="checkbox"] { margin-right: 10px; }
    .upload-btn { background: #989d7f; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; }
    .submit-btn { margin-top: 20px; background: #69714a; color: white; padding: 10px 20px; border: none; border-radius: 6px; cursor: pointer; }
</style>

<div class="container">
    {{-- Form --}}
    @if(session('status'))
        <p style="color: green;">{{ session('status') }}</p>
    @endif

    <form method="POST" action="{{ route('returns.submit') }}">
        @csrf

        {{-- Left side: text fields --}}
        <div class="form-left">
            <label for="order_number">Return An Item</label>
            <input type="text" name="order_number" id="order_number" required placeholder="Order Number *">

            <label for="comment">Reason for Return</label>
            <textarea name="comment" id="comment" rows="5" required placeholder="Comment *"></textarea>

            <label style="margin-top: 20px;">
                <input type="checkbox" name="terms" required>
                I confirm I have read all the terms.
            </label>

            <button type="submit" class="submit-btn">Submit Return</button>
        </div>

        {{-- Right side: upload box --}}
        <div class="form-right">
            <label><strong>Upload File</strong> <em>(optional)</em></label> 
            <button type="button" class="upload-btn">Browse</button> 
        </div>
    </form>
</div>

@endsection
