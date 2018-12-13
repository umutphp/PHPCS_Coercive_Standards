<?php
/**
 * This sniff prohibits the comments with word count less than 3
 *
 * PHP version 5+
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Your Name <you@domain.net>
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

namespace PHP_CodeSniffer\Standards\CoerciveStandards\Sniffs\CommentWordCount;

use PHP_CodeSniffer\Sniffs\Sniff;
use PHP_CodeSniffer\Files\File;

class CoerciveStandards_Sniffs_CommentWordCount implements Sniff
{
    public $emptyTokens = array(
        T_DOC_COMMENT_TAG => T_DOC_COMMENT_TAG
    );

    public $supportedTokenizers = array(
        'PHP'
    );

    public function register()
    {
        return array(
            T_DOC_COMMENT_STRING
        );
    }

    public function process(File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        /*
         * Ignore inherit doc tag
         */
        if ($tokens[$stackPtr]['content'] === "{@inheritdoc}") {
            return;
        }

        $sameToken = $phpcsFile->findNext(array(T_DOC_COMMENT_TAG => T_DOC_COMMENT_TAG), ($stackPtr - 2), null, true);

        // If it is a short description
        if ($tokens[$sameToken]['type'] == 'T_DOC_COMMENT_STAR') {
            if (str_word_count($tokens[$stackPtr]['content']) < 3) {
                $error = 'Comment short description is less then 3 words';
                $phpcsFile->addWarning($error, $stackPtr, 'CommentShortDescriptionWordCount');
            }
        }
    }
}