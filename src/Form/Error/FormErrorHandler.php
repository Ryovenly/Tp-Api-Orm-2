<?php

namespace App\Form\Error;

use Symfony\Component\Form\FormInterface;

class FormErrorHandler{

        private function getErrors(FormInterface $form): array
        {
            $errors = [];
            $formErrors = $form->getErrors(true);
      
            foreach ($formErrors as $error) {
                $field = $error->getOrigin()->getName();
                $message = $error->getMessage();
      
                $errors[$field] = $message;
            }
      
            return $errors;
        }
    }