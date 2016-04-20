<?php
namespace Edu\Cnm\Llaudick\Pgatour;

/**
 * Typical Author for the articles on the PGAtour website
 *
 *
 * @author Lucas Laudick <llaudick@cnm.edu>
 **/
class author implements \JsonSrializable {
		/**
		 * id for this Author; this is the primary key
		 * @var int $authorId
		 **/
		private $authorId;
		/**
		 * the email of the author who wrote the article
		 * @var string $emailContent
		 **/
		private $emailContent;
		/**
		 *
		 * @var string $hashContent
		 **/
		private $hashContent;
		/**
		 * the name of the author for the article content
		 * @var string $nameContent
		 **/
		private $nameContent;
		/**
		 *
		 * @var string $saltContent
		 **/
		private $saltContent;

		/**
		 * accessor method for author id
		 *
		 * @return int|null value of author id
		 **/
		public function getauthorId() {
			return($this->authorId);
		}

		/**
		 * mutator method for author id
		 *
		 * @param int|null $newAuthorId new value of author id
		 * @throws \RangeException if $newAuthorId is positive
		 * @throws \TypeError if $newAuthorId is not an integer
		 **/
		public function setAuthorId(int $newAuthorId = null) {
			// base case: if the author id is null, this a new author wihtout a mySQL assigned id
			if($newAuthorId === null){
				$this->AuthorId = null;
				return;
			}
			//verify the author id is positive
			if($newAuthorId <= 0) {
				throw(new \RangeException("author id is not positive"));
			}
			//convert and store the author id
			$this->authorId = $newAuthorId;
		}

		/**
		 * accessor method for email content
		 *
		 * @return string value of email content
		 **/
		public function getEmailContent() {
			return($this->emailContent);
		}

		/**
		 * mutator method for email content
		 *
		 * @param string $newEmailContent new value of email content
		 * @throws \InvalidArgumentException if $newEmailContent id not a string or insecure
		 * @throws \RangeException id $newEmailContent is > 128 characters
		 * @throws \typeError if $newEmailContent is not a string
		 **/
		public function setEmailContent (string $newEmailContent) {
			// verify the email
			$newEmailContent = trim($newEmailContent);
			$newEmailContent = filter_var($newEmailContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
			if(empty($newEmailContent) === true) {
				throw(new \InvalidArgumentException("email content is empty or insecure"));
			}
			// verify the email content will fit in the database
			if (strlen($newEmailContent) > 128) {
				throw(new \RangeException("email content too large"));
			}
			// store the email content
			$this->emailContent = $newEmailContent;
		}
		/**
		 * accessor method for hash content
		 *
		 * @return string value of hash content
		 */
		public function getHashContent() {
			return($this->hashContent);
		}
		/**
		 * mutator method for the hash content
		 *
		 * @param string $newHashContent new value of hash content
		 * @throws \RangeException if $newHashContent is > 128
		 **/
		public function setHashContent(string $newHashContent) {
			// verify hash content will fit in database
			if(strlen($newHashContent) > 128) {
				throw(new \RangeException("Hash is too long"));
			}
			// store hash content
			$this->hashContent = $newHashContent;
		}

		/**
		 * accessor method for name content
		 *
		 * @return string value of name content
		 **/
		public function getNameContent() {
			return($this->nameContent);
		}

		/**
		 * mutator method for name content
		 *
		 * @param string $newNameContent new value of name content
		 * @throws \InvalidArgumentException if $newNameContent is not a string or insecure
		 **/
		public function setNameContent(string $newNameContent) {
			// verify the name content is valid
			$newNameContent = filter_var($newNameContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
			if($newNameContent === false ) {
				throw(new \InvalidArgumentException("name is not valid string"));
			}
			//store name content
			$this->nameContent = $newNameContent;
		}

		/**
		 * accessor method for salt content
		 *
		 * @return string value of salt content
		 */
		public function getSaltContent() {
			return($this->saltContent);
		}

		/**
		 * mutator method for salt content
		 *
		 * @param string $newSaltContent new value of salt contnent
		 * @throws \RangeException if $newSaltContent is > 64
		 **/
		public function setSaltContent(string $newSaltContent) {
			// verify hash content will fit in database
			if(strlen($newSaltContent) > 64) {
				throw(new \RangeException("Salt content is to large"));
			}
			// store the salt content
			$this->saltContent = $newSaltContent;
		}
	}