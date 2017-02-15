<?php

namespace spec\Mahalay\PhpSpecCodeCoverage;

use Mahalay\PhpSpecCodeCoverage\Extension;
use PhpSpec\ObjectBehavior;
use PhpSpec\ServiceContainer\IndexedServiceContainer;

class ExtensionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(Extension::class);
    }

    function it_should_use_html_format_by_default()
    {
        $container = new IndexedServiceContainer;
        $this->load($container, []);

        $options = $container->get('code_coverage.options');
        expect($options['format'])->toBe(array('html'));
    }

    function it_should_transform_format_into_array()
    {
        $container = new IndexedServiceContainer;
        $container->setParam('code_coverage', array('format' => 'html'));
        $this->load($container);

        $options = $container->get('code_coverage.options');
        expect($options['format'])->toBe(array('html'));
    }

    function it_should_use_singular_output()
    {
        $container = new IndexedServiceContainer;
        $container->setParam('code_coverage', array('output' => 'test', 'format' => 'foo'));
        $this->load($container);

        $options = $container->get('code_coverage.options');
        expect($options['output'])->toBe(array('foo' => 'test'));
    }
}
