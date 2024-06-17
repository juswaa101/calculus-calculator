<div class="flex flex-col justify-between items-center min-h-screen bg-gray-100">
    <div class="max-w-lg w-full md:w-3/4 lg:w-1/2 px-4">
        <header class="text-center mb-4 mt-10">
            <h1 class="text-3xl font-bold text-gray-800">Calculus Calculator</h1>
        </header>
        <form wire:submit.prevent="deriveOrIntegrate" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="mb-4">
                <label for="function" class="block text-gray-700 text-sm font-bold mb-2">Function:</label>
                <input wire:model.lazy="function" id="function" type="text" placeholder="Enter the function..."
                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('function')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Operation:</label>
                <div class="mt-2">
                    <label class="inline-flex items-center">
                        <input wire:model="operation" type="radio" class="form-radio h-5 w-5 text-blue-600"
                            name="operation" value="derivative">
                        <span class="ml-2 text-gray-700">Derivative</span>
                    </label>
                    <label class="inline-flex items-center ml-6">
                        <input wire:model="operation" type="radio" class="form-radio h-5 w-5 text-blue-600"
                            name="operation" value="integral">
                        <span class="ml-2 text-gray-700">Integral</span>
                    </label>
                </div>
                @error('operation')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" wire:loading.attr="disabled" wire:loading.class="opacity-50"
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Calculate
                </button>
                <button type="button" wire:click="resetForm" wire:loading.attr="disabled" wire:loading.class="opacity-50"
                    class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Reset
                </button>
            </div>
        </form>
    </div>

    <div class="max-w-lg w-full md:w-3/4 lg:w-1/2 px-4 overflow-y-auto">
        <div class="mt-6">
            @if ($isCalculating)
                <div class="text-center py-12">
                    <span class="text-gray-600">Calculating...</span>
                </div>
            @elseif (!empty($steps))
                <div class="bg-white shadow-md rounded px-4 py-4 mb-4 overflow-y-auto max-h-96">
                    <h2 class="text-lg font-bold mb-2">Calculation Steps:</h2>
                    @foreach ($steps as $step)
                        <div class="mb-4">
                            <latex-js class="latex-expression" baseURL="https://cdn.jsdelivr.net/npm/latex.js/dist/">
                                <p><strong>{{ $step['step'] }}:</strong> \( {{ $step['expression'] }} \)</p>
                            </latex-js>
                        </div>
                    @endforeach
                </div>
            @endif

            @if (!empty($result))
                <div class="bg-white shadow-md rounded px-4 py-4 mb-4 overflow-y-auto max-h-96">
                    <h2 class="text-lg font-bold mb-2">Result:</h2>
                    <p class="text-gray-700">
                        <latex-js class="latex-expression" baseURL="https://cdn.jsdelivr.net/npm/latex.js/dist/">
                            {{-- Enclose the LaTeX expression within appropriate delimiters --}}
                            {!! '$$' . $result . '$$' !!}
                        </latex-js>
                    </p>
                </div>
            @endif
        </div>
    </div>

    <footer class="text-center text-white text-sm w-full bg-blue-950">
        <div class="container mx-auto py-4">
            <p>&copy; {{ now()->year }} Calculus Calculator. All rights reserved.</p>
        </div>
    </footer>
</div>
