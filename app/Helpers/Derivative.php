<?php

namespace App\Helpers;

class Derivative
{
    public static function applyPowerRule($function)
    {
        // Example: f(x) = 3x^2 -> f'(x) = 6x
        preg_match('/([0-9]*)(x\^)?([0-9]*)/', $function, $matches);

        if (count($matches) === 0) {
            return "Invalid function format. Cannot apply power rule.";
        }

        $coefficient = empty($matches[1]) ? 1 : (int)$matches[1];
        $exponent = empty($matches[3]) ? 1 : (int)$matches[3];

        $newCoefficient = $coefficient * $exponent;
        $newExponent = $exponent - 1;

        if ($newExponent === 0) {
            return "{$newCoefficient}";
        } elseif ($newExponent === 1) {
            return "{$newCoefficient}x";
        } else {
            return "{$newCoefficient}x^{{$newExponent}}";
        }
    }

    public static function applyConstantsAndCoefficientRule($function)
    {
        // Example: f(x) = 3x^2 -> f'(x) = 6x
        // Assume the function is in the form ax^n, where a is a coefficient.

        // Extract the coefficient and exponent using regular expressions
        preg_match('/([+-]?\d*\.?\d+)([a-zA-Z]?\^?\d*)/', $function, $matches);
        $coefficient = floatval($matches[1]);
        $exponent = $matches[2];

        // Calculate the new coefficient and return the derivative
        $newCoefficient = $coefficient * intval($exponent);

        return "f'(x) = {$newCoefficient}x^{{$exponent}}";
    }

    public static function applySumRule($function)
    {
        // Example: f(x) = 3x^2 + 5x - 2 -> f'(x) = 6x + 5
        // For simplicity, let's assume handling sum is integrated with power rule here.
        return self::applyPowerRule($function);
    }

    public static function simplifyDerivative($function)
    {
        // Example: f'(x) = 6x^2 + 12x - 2 -> f'(x) = 6x^2 + 12x - 2 (as it is already simplified)
        // For simplicity, let's assume the derivative is already simplified in this example.
        return $function;
    }

    public static function applyProductRule($function)
    {
        // Example: f(x) = (3x^2)(2x) -> f'(x) = 6x^2 + 12x

        preg_match('/([0-9]*)(x\^)?([0-9]*)/', $function, $matches);

        if (count($matches) === 0) {
            return "Invalid function format. Cannot apply product rule.";
        }

        $coefficient = empty($matches[1]) ? 1 : (int)$matches[1];
        $exponent = empty($matches[3]) ? 1 : (int)$matches[3];

        $newCoefficient = $coefficient * $exponent;
        $newExponent = $exponent - 1;

        if ($newExponent === 0) {
            return "{$newCoefficient}";
        } elseif ($newExponent === 1) {
            return "{$newCoefficient}x";
        } else {
            return "{$newCoefficient}x^{{$newExponent}}";
        }
    }

    public static function applyQuotientRule($function)
    {
        preg_match('/([0-9]*)(x\^)?([0-9]*)/', $function, $matches);

        if (count($matches) === 0) {
            return "Invalid function format. Cannot apply quotient rule.";
        }

        $coefficient = empty($matches[1]) ? 1 : (int)$matches[1];
        $exponent = empty($matches[3]) ? 1 : (int)$matches[3];

        // Compute the numerator part of the quotient rule
        $numeratorCoefficient = $coefficient * $exponent;
        $numeratorExponent = $exponent - 1;

        // Compute the denominator part of the quotient rule
        $denominatorCoefficient = $coefficient * $exponent;
        $denominatorExponent = $exponent - 1;

        // Prepare numerator and denominator strings
        $numerator = '';
        $denominator = '';
        if ($numeratorExponent === 0) {
            $numerator = "{$numeratorCoefficient}";
        } elseif ($numeratorExponent === 1) {
            $numerator = "{$numeratorCoefficient}x";
        } else {
            $numerator = "{$numeratorCoefficient}x^{{$numeratorExponent}}";
        }

        if ($denominatorExponent === 0) {
            $denominator = "{$denominatorCoefficient}";
        } elseif ($denominatorExponent === 1) {
            $denominator = "{$denominatorCoefficient}x";
        } else {
            $denominator = "{$denominatorCoefficient}x^{{$denominatorExponent}}";
        }

        // Construct the final derivative expression using LaTeX format
        return "f'(x) = \\frac{{$numerator}}}{{$denominator}}";
    }

    public static function applyChainRule($function)
    {
        preg_match('/(sin|cos|tan|cot|sec|csc|log|exp)([0-9]*)(x\^)?([0-9]*)/', $function, $matches);

        if (count($matches) === 0) {
            return "Invalid function format. Cannot apply chain rule.";
        }

        $functionName = $matches[1];
        $coefficient = empty($matches[2]) ? 1 : (int)$matches[2];
        $exponent = empty($matches[4]) ? 1 : (int)$matches[4];

        // Derivative of the outer function
        $outerFunctionDerivative = self::applyPowerRule("{$coefficient}x^{$exponent}");

        // Derivative of the inner function
        $innerFunctionDerivative = self::applyPowerRule("{$coefficient}x^{$exponent}");

        return "f'(x) = {$functionName}({$coefficient}x^{{$exponent}}) \\cdot {$innerFunctionDerivative}";
    }
}
