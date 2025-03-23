<?php 

namespace App\Form\Type ;

use App\Entity\ValueObject\Etudiant;
use Symfony\Component\Form\FormError;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\DataMapperInterface;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Exception\UnexpectedTypeException;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Validator\Constraints as Assert;

class EtudiantType extends AbstractType implements DataMapperInterface{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("firstname")
            ->add("email", null, [
                "constraints" => [
                    new Assert\Email()
                ]
            ])
            ->setDataMapper($this)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            "data_class" => Etudiant::class,
            "empty_data" => null,
        ]);
    } 

    /**
     * Undocumented function
     *
     * @param Etudiant $viewData
     * @param \Traversable $forms
     * @return void
     */
    public function mapDataToForms(mixed $viewData, \Traversable $forms): void
    {

        if (null === $viewData) {
            return;
        }

        if (!$viewData instanceof Etudiant) {
            throw new UnexpectedTypeException($viewData, Etudiant::class);
        }
        
    
        $forms = iterator_to_array($forms);
        $forms["firstname"]->setData((string) $viewData->firstname);
        $forms["email"]->setData((string) $viewData->email);
    
    }

    public function mapFormsToData(\Traversable $forms, mixed &$viewData): void
    {
        $forms = iterator_to_array($forms);
        try {
            $viewData = new Etudiant(
                $forms["firstname"]->getData(),
                $forms["email"]->getData(),
            );
        } catch (\InvalidArgumentException $e) {
            $forms['firstname']->addError(new FormError($e->getMessage()));
        }  
    }


}