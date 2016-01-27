<?php
/**
 * PdfTest.php
 *
 * @since       2015-02-21
 * @category    Library
 * @package     Color
 * @author      Nicola Asuni <info@tecnick.com>
 * @copyright   2015-2015 Nicola Asuni - Tecnick.com LTD
 * @license     http://www.gnu.org/copyleft/lesser.html GNU-LGPL v3 (see LICENSE.TXT)
 * @link        https://github.com/tecnickcom/tc-lib-color
 *
 * This file is part of tc-lib-color software library.
 */

namespace Test;

/**
 * Pdf Color class test
 *
 * @since       2015-02-21
 * @category    Library
 * @package     Color
 * @author      Nicola Asuni <info@tecnick.com>
 * @copyright   2015-2015 Nicola Asuni - Tecnick.com LTD
 * @license     http://www.gnu.org/copyleft/lesser.html GNU-LGPL v3 (see LICENSE.TXT)
 * @link        https://github.com/tecnickcom/tc-lib-color
 */
class PdfTest extends \PHPUnit_Framework_TestCase
{
    protected $obj = null;

    public function setUp()
    {
        //$this->markTestSkipped(); // skip this test
        $this->obj = new \Com\Tecnick\Color\Pdf;
    }

    public function testGetJsMap()
    {
        $res = $this->obj->getJsMap();
        $this->assertEquals(12, count($res));
    }

    public function testGetJsColorString()
    {
        $res = $this->obj->getJsColorString('t()');
        $this->assertEquals('color.transparent', $res);
        $res = $this->obj->getJsColorString('["T"]');
        $this->assertEquals('color.transparent', $res);
        $res = $this->obj->getJsColorString('transparent');
        $this->assertEquals('color.transparent', $res);
        $res = $this->obj->getJsColorString('color.transparent');
        $this->assertEquals('color.transparent', $res);
        $res = $this->obj->getJsColorString('magenta');
        $this->assertEquals('color.magenta', $res);
        $res = $this->obj->getJsColorString('#1a2b3c4d');
        $this->assertEquals('["RGB",0.101961,0.168627,0.235294]', $res);
        $res = $this->obj->getJsColorString('#1a2b3c');
        $this->assertEquals('["RGB",0.101961,0.168627,0.235294]', $res);
        $res = $this->obj->getJsColorString('#1234');
        $this->assertEquals('["RGB",0.066667,0.133333,0.200000]', $res);
        $res = $this->obj->getJsColorString('#123');
        $this->assertEquals('["RGB",0.066667,0.133333,0.200000]', $res);
        $res = $this->obj->getJsColorString('["G",0.5]');
        $this->assertEquals('["G",0.500000]', $res);
        $res = $this->obj->getJsColorString('["RGB",0.25,0.50,0.75]');
        $this->assertEquals('["RGB",0.250000,0.500000,0.750000]', $res);
        $res = $this->obj->getJsColorString('["CMYK",0.666,0.333,0,0.25]');
        $this->assertEquals('["CMYK",0.666000,0.333000,0.000000,0.250000]', $res);
        $res = $this->obj->getJsColorString('g(50%)');
        $this->assertEquals('["G",0.500000]', $res);
        $res = $this->obj->getJsColorString('g(128)');
        $this->assertEquals('["G",0.501961]', $res);
        $res = $this->obj->getJsColorString('rgb(25%,50%,75%)');
        $this->assertEquals('["RGB",0.250000,0.500000,0.750000]', $res);
        $res = $this->obj->getJsColorString('rgb(64,128,191)');
        $this->assertEquals('["RGB",0.250980,0.501961,0.749020]', $res);
        $res = $this->obj->getJsColorString('rgba(25%,50%,75%,0.85)');
        $this->assertEquals('["RGB",0.250000,0.500000,0.750000]', $res);
        $res = $this->obj->getJsColorString('rgba(64,128,191,0.85)');
        $this->assertEquals('["RGB",0.250980,0.501961,0.749020]', $res);
        $res = $this->obj->getJsColorString('hsl(210,50%,50%)');
        $this->assertEquals('["RGB",0.250000,0.500000,0.750000]', $res);
        $res = $this->obj->getJsColorString('hsla(210,50%,50%,0.85)');
        $this->assertEquals('["RGB",0.250000,0.500000,0.750000]', $res);
        $res = $this->obj->getJsColorString('cmyk(67%,33%,0,25%)');
        $this->assertEquals('["CMYK",0.670000,0.330000,0.000000,0.250000]', $res);
        $res = $this->obj->getJsColorString('cmyk(67,33,0,25)');
        $this->assertEquals('["CMYK",0.670000,0.330000,0.000000,0.250000]', $res);
        $res = $this->obj->getJsColorString('cmyka(67,33,0,25,0.85)');
        $this->assertEquals('["CMYK",0.670000,0.330000,0.000000,0.250000]', $res);
        $res = $this->obj->getJsColorString('cmyka(67%,33%,0,25%,0.85)');
        $this->assertEquals('["CMYK",0.670000,0.330000,0.000000,0.250000]', $res);
    }

    public function testGetColorObject()
    {
        $res = $this->obj->getColorObject('');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('[*');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('t()');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('["T"]');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('transparent');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('color.transparent');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('#1a2b3c4d');
        $this->assertEquals('#1a2b3c4d', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('#1a2b3c');
        $this->assertEquals('#1a2b3cff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('#1234');
        $this->assertEquals('#11223344', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('#123');
        $this->assertEquals('#112233ff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('["G",0.5]');
        $this->assertEquals('#808080ff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('["RGB",0.25,0.50,0.75]');
        $this->assertEquals('#4080bfff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('["CMYK",0.666,0.333,0,0.25]');
        $this->assertEquals('#4080bfff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('g(50%)');
        $this->assertEquals('#808080ff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('g(128)');
        $this->assertEquals('#808080ff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('rgb(25%,50%,75%)');
        $this->assertEquals('#4080bfff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('rgb(64,128,191)');
        $this->assertEquals('#4080bfff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('rgba(25%,50%,75%,0.85)');
        $this->assertEquals('#4080bfd9', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('rgba(64,128,191,0.85)');
        $this->assertEquals('#4080bfd9', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('hsl(210,50%,50%)');
        $this->assertEquals('#4080bfff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('hsla(210,50%,50%,0.85)');
        $this->assertEquals('#4080bfd9', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('cmyk(67%,33%,0,25%)');
        $this->assertEquals('#3f80bfff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('cmyk(67,33,0,25)');
        $this->assertEquals('#3f80bfff', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('cmyka(67,33,0,25,0.85)');
        $this->assertEquals('#3f80bfd9', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('cmyka(67%,33%,0,25%,0.85)');
        $this->assertEquals('#3f80bfd9', $res->getRgbaHexColor());
        $res = $this->obj->getColorObject('none');
        $this->assertEquals('0.000000 0.000000 0.000000 0.000000', $res->getPdfColor());
        $res = $this->obj->getColorObject('all');
        $this->assertEquals('1.000000 1.000000 1.000000 1.000000', $res->getPdfColor());
        $res = $this->obj->getColorObject('["G"]');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('["RGB"]');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('["CMYK"]');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('g(-)');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('rgb(-)');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('hsl(-)');
        $this->assertNull($res);
        $res = $this->obj->getColorObject('cmyk(-)');
        $this->assertNull($res);

        
    }
}
