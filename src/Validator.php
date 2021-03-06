<?php


namespace IUTLens;


class Validator
{
    /**
     * @var array
     */
    private $data;

    /**
     * @var string[]
     */
    private $errors = [];

    /**
     * Validator constructor.
     * @param array $data
     */
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    /**
     * @param string ...$keys
     * @return $this
     */
    public function required(string ...$keys): self
    {
        foreach ($keys as $key) {
            $value = $this->getValue($key);
            if (is_null($value)) {
                $this->addError($key, "Le champ $key est requis.");
            }
        }
        return $this;
    }

    /**
     * @param string ...$keys
     * @return $this
     */
    public function notEmpty(string ...$keys): self
    {
        foreach ($keys as $key) {
            $value = $this->getValue($key);
            if (is_null($value) || empty($value)) {
                $this->addError($key, "Le champ $key ne peut pas être vide.");
            }
        }
        return $this;
    }

    public function isUploaded(string ...$keys): self
    {
        foreach ($keys as $key) {
            $value = $this->getValue($key);
            if (!is_array($value) || $value['error'] === 4 || $value['size'] !== 0) {
                $this->addError($key, "Le champ $key doit être un fichier uploadé et non vide.");
            }
        }
        return $this;
    }

    public function isTxt(string ...$keys) {
        foreach($keys as $key) {
            $value = $this->getValue($key);
            $parts = explode(".", $value['name']);
            if (end($parts) !== 'txt' && $value['type'] !== 'text/plain') {
                $this->addError($key, "Le champ $key doit être un fichier txt");
            }
        }
        return $this;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return empty($this->errors);
    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }

    /**
     * @param string $key
     * @param string $message
     */
    private function addError(string $key, string $message)
    {
        $this->errors[$key] = $message;
    }

    /**
     * Return the data for a given key
     *
     * @param string $key
     * @return mixed|null
     */
    private function getValue(string $key)
    {
        if (array_key_exists($key, $this->data)) {
            return $this->data[$key];
        }
        return null;
    }

}
