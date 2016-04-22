<?php
namespace Edu\Cnm\Llaudick\Pgatour;

/**
 * Typical Author for the articles on the PGAtour website
 *
 *
 * @author Lucas Laudick <llaudick@cnm.edu>
 **/
class author implements \JsonSerializable {
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
		 * constructor for this author
		 *
		 * @param int|null $newAuthorId of this Author or null if new author
		 * @param string $newEmailContent new value of email content
		 * @param string $newHashContent string containing hash content
		 * @param string $newNameContent string containing name of author
		 * @param string $newSaltContent string containing salt content
		 * @throws \InvalidArgumentException if the data types are not valid
		 * @throws \RangeException if data does not fit in databse
		 * @throws \TypeError if data does
		 * @throws \Exception if other exceptions occur
		 */
		public function __construct(int $newAuthorId = null, string $newEmailContent, string $newHashContent, string $newNameContent, string $newSaltContent) {
			try {
				$this->setAuthorId($newAuthorId);
				$this->setEmailContent($newEmailContent);
				$this->setHashContent($newHashContent);
				$this->setNameContent($newNameContent);
				$this->setSaltContent($newSaltContent);
			} catch(\InvalidArgumentException $invalidArgument) {
				// rethrow the exception to the caller
				throw(new \InvalidArgumentException($invalidArgument->getMessage(), 0, $invalidArgument));
			} catch(\RangeException $range) {
				// rethrow the exception to the caller
				throw(new \RangeException($range->getMessage(), 0, $range));
			} catch(\TypeError $typeError) {
				// rethrow the exception to the caller
				throw(new \TypeError($typeError->getMessage(), 0, $typeError));
			} catch(\Exception $exception) {
				// rethrow the exception to the caller
				throw(new \Exception($exception->getMessage(), 0, $exception));
			}
		}

		/**
		 * accessor method for author id
		 *
		 * @return int|null value of author id
		 **/
		public function getAuthorId() {
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
			if(empty($newEmailContent) === false) {
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
		 * @throws \RangeException if $newHashContent is !== 128
		 **/
		public function setHashContent(string $newHashContent) {
			// verufy the hash content has correct characters
			$newHashContent=ctype_xdigit($newHashContent);
			// verify hash content will fit in database
			if(strlen($newHashContent) !== 128) {
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
		 * @throws \RangeException if $newSaltContent is !== 64
		 **/
		public function setSaltContent(string $newSaltContent) {
			// verify the salt content has the correct characters
			$newSaltContent=ctype_xdigit($newSaltContent);
			// verify salt content is the right length
			if(strlen($newSaltContent) !== 64) {
				throw(new \RangeException("Salt content is wrong lenght"));
			}
			// store the salt content
			$this->saltContent = $newSaltContent;
		}
		/**
		 * inserts this Author into mysql
		 *
		 * @param \PDO $pdo PDO connection object
		 * @throws \PDOException when mySQL related errors occur
		 * @throws \TypeError if $pdo is not a PDO connection object
		 **/
		public function insert(\PDO $pdo) {
			// enforce the authorId is null
			if($this->authorId !== null) {
				throw(new \PDOException("not an author"));
			}

			// create query template
			$query = "INSERT INTO author(emailContent, hashContent, nameContent, saltContent) VALUES(:emailContent, :hashContent, :nameContent, :saltContnent)";
			$statement = $pdo->prepare($query);

			//bind the member variables to the place holders in the template
			$parameters = ["emailContent" => $this->emailContent, "hashContent" => $this->hashContent, "nameContent" => $this->nameContent, "saltContent" => $this->saltContent];
			$statement->execute($parameters);

			// update the null authorId with what mySQL just gave us
			$this->authorId = intval($pdo->lastInsertId());
		}

		/**
		 * updates the Author in mySQL
		 *
		 * @param \PDO $pdo PDO connection object
		 * @throws \PDOException when mySQL related errors occur
		 * @throws \TypeError if $pdo is not a PDO connection object
		 **/
		public function update(\pdo $pdo) {
			// enforce that the authorId is not null
			if($this->authorId === null) {
				throw(new \PDOException("unable to update the author if it does not exist"));
			}

			// create query template
			$query = "UPDATE author SET emailContent = :emailContent, hashContent = :hashContent, nameContent = :nameContent, saltContent = :saltContent WHERE authorId = :authorId";
			$statement = $pdo->prepare($query);

			// bind the member variables to the place holders in the template
			$parameters = ["emailContent" => $this->emailContent, "hashContent" => $this->hashContent, "nameContent" => $this->nameContent, "saltContent" => $this->saltContent];
			$statement->execute($parameters);
		}
		/**
		 * deletes this author from mySQL
		 *
		 *@param \PDO $pdo PDO connection object
		 *@throws \PDOException when mySQL related errors occur
		 *@throws \TypeError if $pdo is not a PDO connection object
		 **/
		public function delete(\PDO $pdo) {
			// enforce the authorId is not null
			if($this->authorId === null) {
				throw(new \PDOException("unable to delete an author that does not exist"));
			}

			// create query template
			$query = "DELETE FROM author WHERE authorId = :authorId";
			$statement = $pdo->prepare($query);

			// bind the member variables to the place holder in the template
			$parameters = ["authorId" => $this->authorId];
			$statement->execute($parameters);
		}
		/**
		 * gets author by emailContent
		 *
		 * @param \PDO $pdo PDO connection object
		 * @param string $emailContent author content to search for
		 * @return \SplFixedArray SplFixedArray of authors found
		 * @throws \PDOException when mySQL related errors occur
		 * @throws \TypeError when variables are not the correct data type
		 **/
		public static function getAuthorByEmailContent(\PDO $pdo, string $emailContent) {
			// sanitize the description before searching
			$emailContent = trim($emailContent);
			$emailContent = filter_var($emailContent, FILTER_SANITIZE_STRING, FILTER_FLAG_NO_ENCODE_QUOTES);
			if(empty($emailContent) === true) {
				throw(new \PDOException("author content is invalid"));
			}

			// create query template
			$query = "SELECT authorId, emailContent, hashContent, nameContent, saltContent FROM author WHERE emailContent LIKE :emailContent";
			$statement = $pdo->prepare($query);

			// bid the email content to the place holder in the template
			$emailContent = "%$emailContent%";
			$parameters = array("emailContent" => $emailContent);
			$statement->execute($parameters);

			//build an array of authors
			$authors = new \SplFixedArray(($statement->rowCount()));
			$statement->setFetchMode(\PDO::FETCH_ASSOC);
			while(($row = $statement->fetch()) !== false) {
				try {
					$author = new Author($row["authorId"], $row["emailContent"], $row["hashContent"], $row["nameContent"], $row["saltContent"]);
					$author[$author->key()] = $author;
					$author->next();
				} catch(\Exception $exception) {
					//if the row couldn't be converted, rethrow it
					throw(new \PDOException($exception->getMessage(), 0, $exception));
				}
			}
			return($authors);
		}

		/**
		 * gets author by authorId
		 *
		 * @param \PDO $pdo PDO connection object
		 * @param int $authorId author id to search for
		 * @return author|null Author found or null if not found
		 * @throws \PDOException when mySQL related errors occur
		 * @throws \TypeError when variables are not the correct data type
		 **/
		public static function getAuthorByAuthorId(\PDO $pdo, int $authorId) {
			//sanitize the authorId before searching
			if($authorId <= 0) {
				throw(new \PDOException("author id is not positive"));
			}

			// create query template
			$query = "SELECT authorId, emailContent, hashContent, nameContent, saltContent FROM author WHERE authorId = :authorId";
			$statement = $pdo->prepare($query);

			// bind the author id to the place holder in the template
			$parameters = array("authorId" => $authorId);
			$statement->execute($parameters);

			//grab the author from mySQL
			try {
				$author = null;
				$statement->setFetchMode(\PDO::FETCH_ASSOC);
				$row = $statement->fetch();
				if($row !== false) {
					$author = new Author($row["authorId"], $row["emailContent"], $row["hashContent"], $row["nameContent"], $row["saltContent"]);
				}
			} catch(\Exception $exception) {
				// if the row couldnt be converted, rethrow it
				throw(new \PDOException($exception->getMessage(), 0, $exception));
			}
			return($author);
		}
		/**
		 * formats the state variabels for Json serialization
		 *
		 * @return array resulting state variables to serialize
		 **/
		public function jsonSerialize() {
			// TODO: Implement jsonSerialize() method.
			$fields = get_object_vars($this);
			unset($fields["hashContent"]);
			unset($fields["saltContent"]);
			return($fields);
		}
}