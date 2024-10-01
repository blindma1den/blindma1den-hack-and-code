<?php

// File generated from our OpenAPI spec

namespace Stripe\Service\Tax;

/**
 * Service factory class for API resources in the Tax namespace.
 *
 * @property AssociationService $associations
 * @property CalculationService $calculations
 * @property FormService $forms
 * @property RegistrationService $registrations
 * @property SettingsService $settings
 * @property TransactionService $transactions
 */
class TaxServiceFactory extends \Stripe\Service\AbstractServiceFactory
{
    /**
     * @var array<string, string>
     */
    private static $classMap = [
        'associations' => AssociationService::class,
        'calculations' => CalculationService::class,
        'forms' => FormService::class,
        'registrations' => RegistrationService::class,
        'settings' => SettingsService::class,
        'transactions' => TransactionService::class,
    ];

    protected function getServiceClass($name)
    {
        return \array_key_exists($name, self::$classMap) ? self::$classMap[$name] : null;
    }
}
