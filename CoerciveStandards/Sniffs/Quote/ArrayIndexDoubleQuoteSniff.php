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
            T_CONSTANT_ENCAPSED_STRING
        );
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        /*$tokens = $phpcsFile->getTokens();
        echo $tokens[$stackPtr]['content'] . PHP_EOL;
        echo "\t" . $tokens[$stackPtr-2]['type'] . ": " . $tokens[$stackPtr-2]['content'] . PHP_EOL;
        echo "\t" . $tokens[$stackPtr-1]['type'] . ": " . $tokens[$stackPtr-1]['content'] . PHP_EOL;
        echo "\t" . $tokens[$stackPtr+1]['type'] . ": " . $tokens[$stackPtr+1]['content'] . PHP_EOL;
        echo "\t" . $tokens[$stackPtr+2]['type'] . ": " . $tokens[$stackPtr+2]['content'] . PHP_EOL;
        $error = 'Do not use double quote in array index';*/
        //$phpcsFile->addWarning($error, $stackPtr, 'ArrayIndexDoubleQuote');
    }
}