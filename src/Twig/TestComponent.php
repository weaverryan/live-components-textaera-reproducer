<?php

namespace App\Twig;

use App\Form\TestType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormInterface;
use Symfony\UX\LiveComponent\Attribute\AsLiveComponent;
use Symfony\UX\LiveComponent\ComponentWithFormTrait;
use Symfony\UX\LiveComponent\DefaultActionTrait;

#[AsLiveComponent]
class TestComponent extends AbstractController
{
    use ComponentWithFormTrait;
    use DefaultActionTrait;

    public array $initialFormData = [
        'editor' => '',
    ];

    public function getUpdatedText(): string
    {
        $data = $this->getForm()->getData();

        return $data['editor']; // does not appear in the DOM
        // return $data['editor'] . ' updated'; // appears in the DOM
    }

    protected function instantiateForm(): FormInterface
    {
        return $this->createForm(
            TestType::class, $this->initialFormData
        );
    }
}
