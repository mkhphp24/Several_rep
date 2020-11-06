<?php

namespace kollex\Services;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Constraints as Assert;

class ValidationData
{
    private $requestData;
    private $validateManager;

    public function __construct(array $requestData)
    {
        $this->requestData = $requestData;
        $this->validateManager = Validation::createValidator();
    }

    /**
     * @param $constraint
     * @param $groups
     *
     * @return array[]
     */
    protected function setValidate($constraint, $groups)
    {
        $messageError = [];
        $values = [];
        $violations = $this->validateManager->validate($this->requestData, $constraint, $groups);

        foreach ($violations as $violation) {
            $messageError[] = array('nameProperty' => $violation->getPropertyPath(), 'message' => $violation->getMessage(), 'value' => $violation->getInvalidValue());
        }

        return ['Error' => $messageError, 'values' => $values];
    }

    /**
     * @return array
     */
    public function validateCheck(): array
    {
        $groups     = new Assert\GroupSequence(['Default', 'custom']);
        $constraint = new Assert\Collection([
               'id' => [ new Assert\NotBlank(), new Assert\Type(['type'=>['string']] )]
            ,  'gtin' => [ new Assert\Type(['type'=>['digit']]) ]
            ,  'manufacturer' => [ new Assert\NotBlank(),new Assert\Type(['type'=>['string']]) ]
            ,  'name' => [ new Assert\NotBlank(),new Assert\Type(['type'=>['string']]) ]
            ,  'packaging' => [ new Assert\NotBlank(),new Assert\Type(['type'=>['string']]) ]
            ,  'baseProductPackaging' => [ new Assert\Type(['type'=>['string']])]
            ,  'baseProductUnit' => [ new Assert\NotBlank(),new Assert\Type(['type'=>['string']]) ]
            ,  'baseProductAmount' => [ new Assert\NotBlank(),new Assert\Type(['type'=>['string']]) ]
            ,  'baseProductQuantity' => [ new Assert\NotBlank(),new Assert\Type(['type'=>['string']]) ]

        ]);

        return $this->setValidate($constraint, $groups);

    }

}
