<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploader
{
    private $targetDirectory;
    private $slugger;

    public function __construct($targetDirectory, SluggerInterface $slugger)
    {
        $this->targetDirectory = $targetDirectory;
        $this->slugger = $slugger;
    }

    public function upload(UploadedFile $file)
    {
        $originalFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename.'-'.uniqid().'.'.$file->guessExtension();

        try {
            $file->move($this->getTargetDirectory(), $fileName);
        } catch (FileException $e) {
            // ... handle exception if something happens during file upload
        }

        return $fileName;
    }

    public function getTargetDirectory()
    {
        return $this->targetDirectory;
    }
}

$brochureFile = $form->get('brochure')->getData();

// this condition is needed because the 'brochure' field is not required
// so the PDF file must be processed only when a file is uploaded
if ($brochureFile) {
    $originalFilename = pathinfo($brochureFile->getClientOriginalName(), PATHINFO_FILENAME);
    // this is needed to safely include the file name as part of the URL
    $safeFilename = $slugger->slug($originalFilename);
    $newFilename = $safeFilename.'-'.uniqid().'.'.$brochureFile->guessExtension();

    // Move the file to the directory where brochures are stored
    try {
        $brochureFile->move(
            $this->getParameter('brochures_directory'),
            $newFilename
        );
    } catch (FileException $e) {
        // ... handle exception if something happens during file upload
    }

    // updates the 'brochureFilename' property to store the PDF file name
    // instead of its contents
    $product->setBrochureFilename($newFilename);
}