<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism-themes/1.9.0/prism-one-light.min.css" integrity="sha512-hS/3ZdmvOJPB/KZXZF9mUeMQuoNmo6BSiJHdUajzlhIs0CTBZMmJbtBkxMJAx7nm7IvigDv8N925UeuM0M96gg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="mt-24 bg-white rounded-lg overflow-hidden shadow-lg border border-gray-300">
    <div class="p-4">
        <div class="flex items-center justify-between">
            <span class="text-gray-800 text-xl font-bold">Code Snippet</span>
            <button id="copyButton" class="px-4 py-2 rounded focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="20px" height="20px" viewBox="0 0 24 24" fill="none">
                    <rect width="24" height="24" fill="white"/>
                    <rect x="4" y="8" width="12" height="12" rx="1" stroke="#000000" stroke-linecap="round" stroke-linejoin="round"/>
                    <path d="M8 6V5C8 4.44772 8.44772 4 9 4H19C19.5523 4 20 4.44772 20 5V15C20 15.5523 19.5523 16 19 16H18" stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-dasharray="2 2"/>
                    </svg>
            </button>
        </div>
    </div>

    <div class="px-3 py-2">
        <pre class="language-javascript"><code class="text-sm">{{ $generatedCode->embed_code }}</code></pre>
    </div>
</div>

<!-- Prism.js JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.25.0/prism.min.js"></script>

<!-- JavaScript to copy the code -->
<script>
    document.getElementById('copyButton').addEventListener('click', function() {
        const codeElement = document.querySelector('.language-javascript code');
        const textArea = document.createElement('textarea');
        textArea.value = codeElement.textContent;
        document.body.appendChild(textArea);
        textArea.select();
        document.execCommand('copy');
        document.body.removeChild(textArea);
        alert('Code copied to clipboard!');
    });
</script>
