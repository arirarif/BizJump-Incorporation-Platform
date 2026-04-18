<?php
/**
 * BizJump Wizard — Plans Data
 *
 * 4 tiers: Basic, Pro, Premium (most popular), Enterprise.
 * Each plan also needs a hidden WC product (created on plugin activation).
 *
 * Prices are BizJump service fees — state filing fee is added separately
 * as a WooCommerce cart fee via wc-hooks.php.
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function bjw_get_plans(): array {
    return [
        [
            'key'         => 'plan_basic',
            'label'       => 'Basic Formation',
            'badge'       => '',
            'price'       => 99.00,
            'billing'     => 'one-time',
            'description' => 'Everything you need to get started.',
            'features'    => [
                'Prepared and Filed Articles',
                'Name Availability Search',
                'Registered Agent (1 year)',
                'Digital Document Delivery',
                'Formation Tracking Dashboard',
                'Email Support',
            ],
            'not_included' => [
                'EIN / Tax ID Filing',
                'Operating Agreement',
                'Annual Compliance Alerts',
                'Expedited Filing',
                'CPA Tax Filing',
            ],
        ],
        [
            'key'         => 'plan_pro',
            'label'       => 'Pro Formation',
            'badge'       => '',
            'price'       => 195.00,
            'billing'     => 'one-time',
            'description' => 'For founders who need compliance handled.',
            'features'    => [
                'Everything in Basic',
                'EIN / Tax ID Filing (included)',
                'Operating Agreement (LLC) or Corporate Bylaws',
                'Annual Compliance Alerts',
                'Priority Email & Chat Support',
                'Expedited State Filing (5–7 days)',
            ],
            'not_included' => [
                'CPA Tax Filing',
                'Bank Account Setup',
                'Digital Marketing Setup',
            ],
        ],
        [
            'key'         => 'plan_premium',
            'label'       => 'Premium Formation',
            'badge'       => 'Most Popular',
            'price'       => 295.00,
            'billing'     => 'one-time',
            'description' => 'Our most complete one-time formation package.',
            'features'    => [
                'Everything in Pro',
                'Registered Agent (1 year) — included',
                'Annual Compliance Alerts — included',
                'Executive Corporate Kit',
                'Bank Account Setup',
                'IRS Form 2553 (S-Corp election)',
                'Accounting System Setup',
                'Rush Filing (3–5 business days)',
                'Dedicated Account Manager',
            ],
            'not_included' => [
                'CPA Tax Filing (add-on)',
                'Digital Marketing Setup (add-on)',
            ],
        ],
        [
            'key'         => 'plan_enterprise',
            'label'       => 'Enterprise Formation',
            'badge'       => 'All-Inclusive',
            'price'       => 295.00,         // one-time formation fee
            'subscription_price' => 29.00,   // monthly recurring
            'billing'     => 'one-time + $29/mo',
            'description' => 'All-in-one with ongoing compliance support + corporate website.',
            'features'    => [
                'Everything in Premium',
                'Corporate Website (included)',
                'Ongoing Compliance Monitoring — $29/mo',
                'Annual Report Filing',
                'Quarterly Business Health Check',
                'Priority Phone Support',
                'Dedicated Compliance Officer',
            ],
            'not_included' => [],
        ],
    ];
}

/**
 * Get a single plan array by key.
 */
function bjw_get_plan( string $key ): array {
    foreach ( bjw_get_plans() as $plan ) {
        if ( $plan['key'] === $key ) {
            return $plan;
        }
    }
    return [];
}
