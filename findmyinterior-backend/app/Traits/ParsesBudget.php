<?php

namespace App\Traits;

trait ParsesBudget
{
    /**
     * Parses a raw budget string like '1.5cr' into a numeric value.
     */
    protected function parseBudget(?string $budgetRaw, &$budgetMin, &$budgetMax): void
    {
        if (!$budgetRaw) {
            return;
        }

        // If min/max are already set numerically, don't overwrite
        if ($budgetMin !== null || $budgetMax !== null) {
            return;
        }

        $clean = strtolower(preg_replace('/[^\d.a-zA-Z]/', '', $budgetRaw));
        if (is_numeric($clean)) {
            $budgetMin = $budgetMax = (float) $clean;
        } else {
            preg_match('/([\d.]+)([a-zA-Z]+)/', $clean, $matches);
            if (count($matches) === 3) {
                $val = (float) $matches[1];
                $unit = $matches[2];
                if (str_starts_with($unit, 'l')) {
                    $val *= 100000;
                } elseif (str_starts_with($unit, 'c') || str_starts_with($unit, 'cr')) {
                    $val *= 10000000;
                } elseif (str_starts_with($unit, 'k')) {
                    $val *= 1000;
                }
                $budgetMin = $budgetMax = $val;
            } else {
                $numOnly = preg_replace('/[^0-9.]/', '', $clean);
                if (is_numeric($numOnly)) {
                    $budgetMin = $budgetMax = (float) $numOnly;
                }
            }
        }
    }
}
