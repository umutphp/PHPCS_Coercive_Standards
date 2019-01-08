<?php
/**
 * This sniff prohibits the usage of lower case in constant names
 *
 * PHP version 5+
 *
 * @category PHP
 * @package  PHP_CodeSniffer
 * @author   Umut Işık <umutphp@gmail.com>
 * @license  https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link     http://pear.php.net/package/PHP_CodeSniffer
 */

namespace CoerciveStandards\Sniffs\Constant;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class ConstantNameUpperCase implements Sniff
{
    public $supportedTokenizers = array(
        'PHP'
    );

    public function register()
    {
        return array(
            T_CONST
        );
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();
		
        if ($tokens[$stackPtr]['type'] === 'T_CONST') {
            $stringPosition = $phpcsFile->findNext(array(T_STRING), $stackPtr);

            if (strtoupper($tokens[$stringPosition]['content']) !== $tokens[$stringPosition]['content']) {
                $error = 'Do not use lower case in constant names';
                $phpcsFile->addWarning($error, $stackPtr, 'UpperCase');
            }
        }
    }
}