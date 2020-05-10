<?php declare(strict_types=1);
use PHPUnit\Framework\TestCase;
use Acme\MajorChords;

Final Class MajorChordsTest extends TestCase
{

    
    
    public function testArrayMustHave12Positions(): void
    {
        $this->assertEquals(
            12,
            count(MajorChords::getPossibleNotes())
        );
    }

    public function testReturnErrorIfInsertedAnInvalidPosition(): void
    {
        $this->expectException(InvalidArgumentException::class);
        MajorChords::returnNote(15);
    }

    public function testReturnErrorIfInsertedAnValidPosition(): void
    {
        $this->expectException(InvalidArgumentException::class);
        MajorChords::returnNote(15);
    }

    public function testReturnErrorIfInsertedAnString(): void
    {
        $this->expectException(InvalidArgumentException::class);
        MajorChords::returnNote("aaa");
    }

    public function testReturnErrorIfInsertedAnStringNoteThatNotExist(): void
    {
        $this->assertFalse(MajorChords::validateIfIsNote("E#"));
    }

    public function testReturnErrorIfInsertedAnStringNoteThatExist(): void
    {
        $this->assertTrue(MajorChords::validateIfIsNote("E"));
    }

    public function testMethodMustReturnExceptionIfTheNoteNotExist() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->assertTrue(is_array(MajorChords::returnMajorScaleByNote("E#")));
    }

    public function testMethodMustReturnArrayIfNoteExist() : void
    {
        $this->assertTrue(is_array(MajorChords::returnMajorScaleByNote("E")));
    }

    public function testMethodMustReturnArrayIfWith7notes() : void
    {
        $this->assertEquals(8, count(MajorChords::returnMajorScaleByNote("E")));
    }

    public function testMethodMustReturnC_Scale() : void
    {
        $C_Scale = ["C", "D", "E", "F", "G", "A", "B", "C"];
        $this->assertEquals($C_Scale, (MajorChords::returnMajorScaleByNote("C")));
    }

    public function testMethodMustReturnG_Scale() : void
    {
        $G_Scale = ["G", "A", "B", "C", "D", "E", "F#", "G"];
        $this->assertEquals($G_Scale, (MajorChords::returnMajorScaleByNote("G")));
    }

    public function testMethodReturnIntervalScaleDeclareCWithThird() : void
    {
        $this->assertEquals("E", MajorChords::returnNoteReference("C", 3));
    }

    public function testMethodReturnIntervalScaleDeclareGWithThird() : void
    {
        $this->assertEquals("B", MajorChords::returnNoteReference("G", 3));
    }

    public function testReturnPossiblePosition() : void
    {
        $this->assertEquals("E", MajorChords::returnNote(4));
    }


    public function testReturnImpossibleNote() : void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->assertEquals(-1, MajorChords::returnPositionByNote("Z"));
    }

    public function testReturnPositionNoteG() : void
    {
        $this->assertEquals(8-1, MajorChords::returnPositionByNote("G"));
    }

    public function testReturnWithImpossibleNoteC() : void
    {
        $this->assertEquals(0, MajorChords::returnPositionByNote("C"));
    }


}