<?php

$header = <<<EOF
This file is part of the guanguans/yii-event.

(c) guanguans <ityaozm@gmail.com>

This source file is subject to the MIT license that is bundled.
EOF;

$finder = Symfony\Component\Finder\Finder::create()
    ->in([
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ])
    ->name('*.php')
    ->notName('*.blade.php')
    ->ignoreDotFiles(true)
    ->ignoreVCS(true);

return (new PhpCsFixer\Config())
    ->setRules([
        // '@PSR12' => true,
        '@Symfony' => true,
        'header_comment' => [
            'header' => $header,
            'comment_type' => 'PHPDoc'
        ],
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'no_unused_imports' => true,
        'not_operator_with_successor_space' => true,
        'no_useless_else' => true,
        'no_useless_return' => true,
        'single_quote' => true,
        'class_attributes_separation' => true,
        'standardize_not_equals' => true,
        // 'trailing_comma_in_multiline' => true,
        // 'php_unit_construct' => true,
        // 'php_unit_strict' => true,
        // 'declare_strict_types' => true,
    ])
    // ->setRiskyAllowed(true)
    ->setFinder($finder);
