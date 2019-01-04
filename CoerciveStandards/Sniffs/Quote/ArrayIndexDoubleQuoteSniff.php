<?php
/**
 * This sniff prohibits the usage of double quotes in array index
 *
 * PHP version 5+
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @author   Umut Işık <umutphp@gmail.com>
 * @license  https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link     http://pear.php.net/package/PHP_CodeSniffer
 */

namespace CoerciveStandards\Sniffs\Quote;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class ArrayIndexDoubleQuote implements Sniff
{
    public $supportedTokenizers = array(
        'PHP'
    );

    public function register()
    {
        return array(
            T_ARRAY,
            T_VARIABLE
        );
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        if ($tokens[$stackPtr]['type'] === 'T_ARRAY') {
            $stringPosition = $phpcsFile->findNext(array(T_CONSTANT_ENCAPSED_STRING), $stackPtr);

            if ($tokens[$stringPosition]['content'][0] === '"') {
                $error = 'Do not use double quote in array index';
                $phpcsFile->addWarning($error, $stackPtr, 'ArrayIndexDoubleQuote');
            }
        }

        if ($tokens[$stackPtr]['type'] === 'T_VARIABLE') {
            $openBracketPosition = $phpcsFile->findNext(array(T_OPEN_SQUARE_BRACKET), $stackPtr);
            $equalPosition       = $phpcsFile->findNext(array(T_EQUAL), $stackPtr);
            $stringPosition      = $phpcsFile->findNext(array(T_CONSTANT_ENCAPSED_STRING), $stackPtr);

            if ($openBracketPosition < $equalPosition) {
                if ($tokens[$stringPosition]['content'][0] === '"') {
                    $error = 'Do not use double quote in array index';
                    $phpcsFile->addWarning($error, $stackPtr, 'ArrayIndexDoubleQuote');
                }
            }
        }
    }
}