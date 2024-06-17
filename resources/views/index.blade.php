<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')

    <script type="module">
        import {
            LaTeXJSComponent
        } from "https://cdn.jsdelivr.net/npm/latex.js/dist/latex.mjs"
        customElements.define("latex-js", LaTeXJSComponent)
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .latex-box {
            border: 1px solid #c3c3c3;
            /* Add a border for the LaTeX box */
            padding: 8px;
            /* Add padding for spacing */
            border-radius: 0.5rem;
            /* Add border-radius for rounded corners */
        }

        .latex-expression {
            font-size: 18px !important;
            /* Adjust font-size for better readability */
            color: #4a5568;
            /* Adjust text color */
            line-height: 1.5;
            /* Adjust line height for spacing */
            text-align: justify !important;
        }

        latex-js {
            --size: auto !important;
            --textwidth: auto !important;
            --marginleftwidth: auto !important;
            --marginrightwidth: auto !important;
            --marginparwidth: auto !important;
            --marginparsep: auto !important;
            --marginparpush: auto !important;
        }
    </style>
</head>

<body>
    <livewire:calculate />
</body>

</html>
