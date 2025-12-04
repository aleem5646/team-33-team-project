@extends('layouts.customer-layout')
@section('title','About')

@section('content')

<div class="w-[90%] mx-auto py-10">
    <div class="flex justify-between gap-5 mt-10 flex-col md:flex-row">
        
        <div id="box-about" class="about-box flex-1 h-[380px] bg-[#969f82] flex justify-center items-center rounded text-center p-5 text-xl font-semibold text-black transition-all duration-300 hover:scale-[1.03] hover:shadow-lg md:h-[260px] cursor-pointer">
            ABOUT US
        </div>

        <div id="box-mission" class="about-box flex-1 h-[380px] bg-[#969f82] flex justify-center items-center rounded text-center p-5 text-xl font-semibold text-black transition-all duration-300 hover:scale-[1.03] hover:shadow-lg md:h-[260px] cursor-pointer">
            OUR MISSION
        </div>

        <div id="box-community" class="about-box flex-1 h-[380px] bg-[#969f82] flex justify-center items-center rounded text-center p-5 text-xl font-semibold text-black transition-all duration-300 hover:scale-[1.03] hover:shadow-lg md:h-[260px] cursor-pointer">
            HOW MUCH THE<br>COMMUNITY HAS<br>HELPED
        </div>
    </div>

    <div id="content-area" class="mt-10 p-8 bg-gray-100 rounded-lg shadow-md text-gray-800">
        <h3 class="text-2xl font-bold mb-4">Click a box above to learn more</h3>
        <p>Select "ABOUT US", "OUR MISSION", or "COMMUNITY HELPED" to view details about Solara here.</p>
    </div>
</div>

<script>
    const contents = {
        'box-about': {
            title: 'About Solara',
            text: 'Solara is your premier destination for high-quality, sustainable products. We carefully curate our collection to ensure every item supports an eco-friendly lifestyle, helping you make a positive impact on the planet with every purchase.'
        },
        'box-mission': {
            title: 'Our Mission',
            text: 'Our Sustainable Mission',
text: 'Our mission is simple: to make sustainable living accessible and stylish. We aim to inspire a global shift toward conscious consumption by offering beautiful, durable alternatives to everyday items, minimizing waste and promoting environmental stewardship.'
        },
        'box-community': {
            title: 'Community Impact',
            text: 'The Solara community is actively making a difference! With every purchase made on our site, a percentage of profits goes directly to verified global reforestation projects and ocean cleanup initiatives. Your support has already helped plant thousands of trees!'
        }
    };

    function updateContent(boxId) {
        const contentArea = document.getElementById('content-area');
        const content = contents[boxId];
        
        if (content) {
            contentArea.innerHTML = `
                <h3 class="text-2xl font-bold mb-4">${content.title}</h3>
                <p>${content.text}</p>
            `;
            contentArea.scrollIntoView({ behavior: 'smooth' });
        }
    }

    document.querySelectorAll('.about-box').forEach(box => {
        box.addEventListener('click', () => {
            updateContent(box.id);
        });
    });
</script>

@endsection
