<?php

namespace App\Livewire;

use App\Helpers\Derivative;
use App\Helpers\Integral;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Calculate extends Component
{
    #[Validate('required|string|bail')]
    public $function;

    #[Validate('required|in:derivative,integral')]
    public $operation = 'derivative'; // Default operation is derivative

    public $steps = [];
    public $result;
    public $isCalculating = false; // Add isCalculating property and initialize it as false


    public function deriveOrIntegrate()
    {
        $this->validate();

        $this->steps = [];
        $this->isCalculating = true; // Set isCalculating to true when calculation starts

        if ($this->operation === 'derivative') {
            // Calculate derivative steps
            $this->calculateDerivative();
        } elseif ($this->operation === 'integral') {
            // Calculate integral steps
            $this->calculateIntegral();
        }

        $this->isCalculating = false; // Set isCalculating to false when calculation completes
    }

    private function calculateDerivative()
    {
        $this->addStep('Step 1: Apply power rule', "\\frac{d}{dx}({$this->function})");
        $this->addStep('Step 2: Handle constants and coefficient rule (if applicable)', Derivative::applyConstantsAndCoefficientRule($this->function));
        $this->addStep('Step 3: Apply sum rule', Derivative::applySumRule($this->function));
        $this->addStep('Step 4: Simplify the derivative', Derivative::simplifyDerivative($this->function));

        $this->result = Derivative::simplifyDerivative($this->function);
    }

    private function calculateIntegral()
    {
        $this->addStep('Step 1: Apply integration rule', "\\int {$this->function} \\, dx");
        $this->addStep('Step 2: Handle constant factor (if applicable)', Integral::handleConstantFactor($this->function));
        $this->addStep('Step 3: Apply basic integration rules (if applicable)', Integral::applyBasicIntegrationRules($this->function));
        $this->addStep('Step 4: Apply substitution method (if applicable)', Integral::applySubstitutionMethod($this->function));
        $this->addStep('Step 5: Simplify the integral', Integral::simplifyIntegral($this->function));

        $this->result = "\\int {$this->function} \\, dx = " . Integral::simplifyIntegral($this->function);
    }

    private function addStep($step, $expression)
    {
        $this->steps[] = [
            'step' => $step,
            'expression' => $expression,
        ];
    }

    public function resetForm()
    {
        $this->reset([
            'steps', 'result', 'function', 'operation'
        ]);
    }

    public function render()
    {
        return view('livewire.calculate', [
            'steps' => $this->steps,
            'result' => $this->result,
        ]);
    }
}
