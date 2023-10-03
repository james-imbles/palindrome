<?php declare(strict_types=1);

namespace App\Services;

/**
 * Pangrams, anagrams and palindromes
 * 
 * Implement each of the functions of the Checker class. 
 * Aim to spend about 10 minutes on each function. 
 */
class Checker
{
    public function __invoke(array $validated)
    {
        switch ($validated['mode']) {
            case 'palindrome':
                return $this->isPalindrome($validated['inputOne']);
            case 'anagram':
                return $this->isAnagram($validated['inputOne'], $validated['inputTwo']);
            case 'pangram':
                return $this->isPangram($validated['inputOne']);
          }    
    }

    /**
     * A palindrome is a word, phrase, number, or other sequence of characters 
     * which reads the same backward or forward.
     *
     * @param string $word
     * @return bool
     */
    public function isPalindrome(string $word) : bool
    {
        return $this->sanitizeString($word) === strrev($this->sanitizeString($word));
    }
    
    /**
     * An anagram is the result of rearranging the letters of a word or phrase 
     * to produce a new word or phrase, using all the original letters 
     * exactly once.
     * 
     * @param string $word
     * @param string $comparison
     * @return bool
     */
    public function isAnagram(string $word, string $comparison) : bool
    {
        if($word === $comparison)return false;
        return count_chars($this->sanitizeString($word), 1) === count_chars($this->sanitizeString($comparison), 1);
    }

    /**
     * A Pangram for a given alphabet is a sentence using every letter of the 
     * alphabet at least once. 
     * 
     * @param string $phrase
     * @return bool
     */    
    public function isPangram(string $phrase) : bool
    {
        $phraseChars = count_chars($this->sanitizeString($phrase), 1);
        $alphaChars = count_chars(implode(range('A', 'Z')), 1);
        return (array_keys($phraseChars) === array_keys($alphaChars));
    }

    public function sanitizeString($string){
        return strtoupper(preg_replace("/[^A-Za-z0-9]/","",$string));
    }
}