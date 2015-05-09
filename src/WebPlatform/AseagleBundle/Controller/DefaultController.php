<?php

namespace WebPlatform\AseagleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use WebPlatform\AseagleBundle\Form\Model\Document;


class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $a = 1;
        return $this->render('AseagleBundle:Default:index.html.twig', array('name' => 'Aseagle','status'=>'index', 'uploadedURL'=>'index'));
    }

    public function upload_fileAction()
    {
        error_reporting(E_ALL | E_STRICT);
        require('bundles/framework/vendor/jquery_file_upload/server/php/UploadHandler.php');

        //get current user
        $user = $this->getUser();
        $today = date('Y-m-d');
        $upload_handler = new UploadHandler(null, true, null,$user->getId().'/'.$today.'/');

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public function delete_fileAction(Request $request)
    {
        $path = $request->query->get('dir')."/";

        //get current user
        $user = $this->getUser();
        return self::handleFile($path, $user);
    }

    public static function handleFile($path, $user)
    {
        error_reporting(E_ALL | E_STRICT);
        require('bundles/framework/js/jquery-file-upload/server/php/UploadHandler.php');

        $today = date('Y-m-d');
        $upload_handler = new UploadHandler(null, true, null,$path);

        $response = new Response();
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    public static function processImage(UploadedFile $uploaded_file)
    {
        $path = 'pictures/artist/';
        $uploaded_file_info = pathinfo($uploaded_file->getClientOriginalName());
        $filename = uniqid() . "." .$uploaded_file_info['extension'];

        $uploaded_file->move($path, $filename);

        return $filename;
    }
}
