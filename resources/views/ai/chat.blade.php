<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Tempting AI Assistant</title>

    @vite(['resources/css/app.css','resources/js/app.js'])

</head>

<body class="bg-gray-100">

@include('components.navbar')

<div class="max-w-6xl mx-auto py-10">

    <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

        <div class="bg-orange-500 text-white p-6">

            <h1 class="text-3xl font-bold">

                🤖 Tempting AI Assistant

            </h1>

            <p class="mt-2 text-orange-100">

                Ask anything about cakes, flavours,
                occasions and recommendations.

            </p>

        </div>

        <div
            id="chat-box"
            class="h-[550px] overflow-y-auto bg-gray-50 p-6 space-y-6">

            <div class="flex">

                <div
                    class="bg-orange-500 text-white rounded-2xl px-5 py-4 max-w-xl">

                    👋 Hello!

                    <br><br>

                    I'm your bakery assistant.

                    <br><br>

                    Ask me things like:

                    <ul class="list-disc ml-6 mt-3 space-y-1">

                        <li>Suggest a birthday cake</li>

                        <li>Chocolate cake under ₹800</li>

                        <li>Eggless cakes</li>

                        <li>Best anniversary cake</li>

                        <li>Cake for 20 people</li>

                    </ul>

                </div>

            </div>

        </div>

        <div
            id="typing"
            class="hidden px-6 py-3 text-gray-500 italic">

            🤖 Tempting AI is typing...

        </div>

        <div class="border-t p-6">

            <form
                id="chat-form"
                class="flex gap-4">

                @csrf

                <input

                    id="message"

                    type="text"

                    placeholder="Ask about cakes..."

                    class="flex-1 border rounded-xl p-4 focus:outline-none focus:ring-2 focus:ring-orange-500"

                    autocomplete="off"

                    required>

                <button

                    class="bg-orange-500 hover:bg-orange-600 text-white px-8 rounded-xl font-semibold">

                    Send

                </button>

            </form>

        </div>

    </div>

</div>

@include('components.footer')

<script>



const form = document.getElementById('chat-form');
const message = document.getElementById('message');
const chat = document.getElementById('chat-box');
const typing = document.getElementById('typing');

function scrollBottom(){
    chat.scrollTop = chat.scrollHeight;
}

function escapeHtml(text){
    const div=document.createElement('div');
    div.innerText=text;
    return div.innerHTML;
}

function addUserMessage(text){

    chat.innerHTML += `
    <div class="flex justify-end mb-4">

        <div class="bg-orange-500 text-white px-5 py-4 rounded-2xl max-w-xl shadow">

            ${escapeHtml(text)}

        </div>

    </div>
    `;

    scrollBottom();
}

function addAIMessage(text){

    chat.innerHTML += `
    <div class="flex mb-4">

        <div class="bg-white border px-5 py-4 rounded-2xl max-w-xl shadow whitespace-pre-wrap">

            ${escapeHtml(text)}

        </div>

    </div>
    `;

    scrollBottom();
}

form.addEventListener('submit', async function(e){

    e.preventDefault();

    const userMessage = message.value.trim();

    if(userMessage==="") return;

    addUserMessage(userMessage);

    message.value="";

    typing.classList.remove('hidden');

    try{

        const response = await fetch("{{ route('ai.ask') }}",{

            method:"POST",

            headers:{

                "Content-Type":"application/json",

                "Accept":"application/json",

                "X-CSRF-TOKEN":"{{ csrf_token() }}"

            },

            body:JSON.stringify({

                message:userMessage

            })

        });

        const data = await response.json();

        typing.classList.add('hidden');

        addAIMessage(data.answer);

    }

    catch(error){

        typing.classList.add('hidden');

        addAIMessage("Sorry, I couldn't connect to the AI assistant. Please try again.");

    }

});

</script>
const params = new URLSearchParams(window.location.search);

const quickQuestion = params.get('question');

if (quickQuestion) {

    message.value = quickQuestion;

    form.dispatchEvent(new Event('submit'));

}

</body>

</html>