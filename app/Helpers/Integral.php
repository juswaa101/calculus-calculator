<?php

namespace App\Helpers;

class Integral
{
    public static function handleConstantFactor($function)
    {
        // Example: ∫(3x^2)dx = (3/3)x^3 + C
        // Handling constant factor
        preg_match('/([0-9]*)(x\^)?([0-9]*)/', $function, $matches);

        if (count($matches) === 0) {
            return "Invalid function format. Cannot integrate.";
        }

        $coefficient = empty($matches[1]) ? 1 : (float)$matches[1];
        $exponent = empty($matches[3]) ? 1 : (int)$matches[3] + 1;

        $newCoefficient = $coefficient / $exponent;

        if ($exponent === 1) {
            return "{$newCoefficient}x + C";
        } else {
            return "{$newCoefficient}x^{$exponent} + C";
        }
    }

    public static function applyBasicIntegrationRules($function)
    {
        // Example: ∫(3x^2)dx = (3/3)x^3 + C
        // Applying basic integration rules
        preg_match('/([0-9]*)(x\^)?([0-9]*)/', $function, $matches);

        if (count($matches) === 0) {
            return "Invalid function format. Cannot integrate.";
        }

        $coefficient = empty($matches[1]) ? 1 : (float)$matches[1];
        $exponent = empty($matches[3]) ? 1 : (int)$matches[3] + 1;

        $newCoefficient = $coefficient / $exponent;

        if ($exponent === 1) {
            return "{$newCoefficient}x + C";
        } else {
            return "{$newCoefficient}x^{$exponent} + C";
        }
    }

    public static function applySubstitutionMethod($function)
    {
        // Example: ∫(3x^2)dx = (3/3)x^3 + C
        // Applying substitution method
        preg_match('/([0-9]*)(x\^)?([0-9]*)/', $function, $matches);

        if (count($matches) === 0) {
            return "Invalid function format. Cannot integrate.";
        }

        $coefficient = empty($matches[1]) ? 1 : (float)$matches[1];
        $exponent = empty($matches[3]) ? 1 : (int)$matches[3] + 1;

        $newCoefficient = $coefficient / $exponent;

        if ($exponent === 1) {
            return "{$newCoefficient}x + C";
        } else {
            return "{$newCoefficient}x^{$exponent} + C";
        }
    }

    public static function simplifyIntegral($function)
    {
        // Example: Simplify the integral result
        // Simplifying integrals
        preg_match('/([0-9]*)(x\^)?([0-9]*)/', $function, $matches);

        if (count($matches) === 0) {
            return "Invalid function format. Cannot integrate.";
        }

        $coefficient = empty($matches[1]) ? 1 : (float)$matches[1];
        $exponent = empty($matches[3]) ? 1 : (int)$matches[3] + 1;

        $newCoefficient = $coefficient / $exponent;

        if ($exponent === 1) {
            return "{$newCoefficient}x + C";
        } else {
            return "{$newCoefficient}x^{$exponent} + C";
        }
    }
}
