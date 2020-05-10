<?php
namespace Acme;

Final Class MajorChords
{
    
    const POSSIBLE_NOTES = array("C", "C#" ,"D", "D#", "E", "F", "F#" ,"G", "G#" ,"A", "A#", "B");

    public static function getPossibleNotes() : array
    { 
        return MajorChords::POSSIBLE_NOTES;
    }

    public static function returnNote($position) : string
    {
        if(!array_key_exists($position, MajorChords::POSSIBLE_NOTES)) {
            throw new \InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid position',
                    $position
                )
            );
        }
        return MajorChords::POSSIBLE_NOTES[$position]; 
    }

    public static function validateIfIsNote(String $note) : bool
    { 
        return (in_array($note, MajorChords::POSSIBLE_NOTES));  
    }

    public static function returnMajorScaleByNote(String $note) : array
    {
        if(!MajorChords::validateIfIsNote($note)) {
            throw new \InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid note',
                    $note
                )
            );
        }

        $note = strtoupper($note);

        $scale[] = $note;
        
        // Return position of tonic note
        $positionNote = MajorChords::returnPositionByNote($note);

        // Above using rule T - T - SMT - T - T - T - SMT
        $scale[] = MajorChords::nextNoteScale($positionNote, 2);
        $positionNote = $positionNote +2;

        $scale[] = MajorChords::nextNoteScale($positionNote, 2);
        $positionNote = $positionNote +2;

        $scale[] = MajorChords::nextNoteScale($positionNote, 1);
        $positionNote = $positionNote +1;

        $scale[] = MajorChords::nextNoteScale($positionNote, 2);
        $positionNote = $positionNote +2;

        $scale[] = MajorChords::nextNoteScale($positionNote, 2);
        $positionNote = $positionNote +2;

        $scale[] = MajorChords::nextNoteScale($positionNote, 2);
        $positionNote = $positionNote +1;

        $scale[] = MajorChords::nextNoteScale($positionNote, 2);
        $positionNote = $positionNote +2;

        return $scale;
    }

    public function returnNoteReference($note, $reference)
    {
        $scale = MajorChords::returnMajorScaleByNote($note);
        return $scale[$reference-1]; 
    }

    public static function nextNoteScale($initialPosition, $positionSteps) : String
    {
        if($initialPosition+$positionSteps) {
            $difference = ($initialPosition+$positionSteps - 12);
        }

        if(!array_key_exists($initialPosition+$positionSteps,  MajorChords::POSSIBLE_NOTES)) {
            return MajorChords::POSSIBLE_NOTES[$difference];
        }
        return MajorChords::POSSIBLE_NOTES[$initialPosition + $positionSteps];
    }

    public static function returnPositionByNote($note) : Int
    {
        if(MajorChords::validateIfIsNote($note)) {
            $key = array_search($note, MajorChords::POSSIBLE_NOTES);
            return $key;
        }else {
            throw new \InvalidArgumentException(
                sprintf(
                    '"%s" is not a valid note',
                    $note
                )
            );
            return null;
        }
    }
}