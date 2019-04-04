<?php

// Namespace
namespace Alphametric\Validation\Rules\Tests;

// Using directives
use Alphametric\Validation\Rules\CountryCode;
use Orchestra\Testbench\TestCase as Orchestra;

// Country code test
class CountryCodeTest extends Orchestra
{

	/** @test */
	public function a_two_letter_country_code_can_be_validated()
	{
		// Define the validation rule
		$rule = ['code' => [new CountryCode(2)]];

		// Execute the tests
		$this->assertTrue(validator(['code' => 'US'], $rule)->passes());
		$this->assertTrue(validator(['code' => 'VU'], $rule)->passes());
		$this->assertFalse(validator(['code' => 'xx'], $rule)->passes());
	}



	/** @test */
	public function a_three_letter_country_code_can_be_validated()
	{
		// Define the validation rule
		$rule = ['code' => [new CountryCode(3)]];

		// Execute the tests
		$this->assertTrue(validator(['code' => 'SAU'], $rule)->passes());
		$this->assertTrue(validator(['code' => 'SDN'], $rule)->passes());
		$this->assertFalse(validator(['code' => 'xxx'], $rule)->passes());
	}

}