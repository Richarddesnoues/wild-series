<?php
namespace App\Controller;
set_time_limit(120);
// le set_time_limit sert à éviter une erreur "time limit" dû à limitation de ram materiel


use App\Repository\ProgramRepository;
use App\Entity\Episode;
use App\Entity\Season;
use App\Entity\Program;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


#[Route('/program', name: 'program_')]
class ProgramController extends AbstractController
{

    #[Route('/', name: 'index')]
    public function index(ProgramRepository $programRepository): Response
    {
        $programs = $programRepository->findAll();


        return $this->render('program/index.html.twig', ['programs' => $programs]);
    }


    #[Route('/show/{id<^[0-9]+$>}', name: 'show')]
    public function show(int $id, ProgramRepository $programRepository): Response
    {
        $program = $programRepository->findOneBy(['id' => $id]);
        // same as $program = $programRepository->find($id);
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$id.' found in program\'s table.'
            );
        }
       return $this->render('program/show.html.twig', [
        'program' => $program,
       ]);
    }

    #[Route('/{program}/season/{season}', name:'season_show')]
    public function showSeason(Program $program, Season $season): Response
    {
        
        // same as $program = $programRepository->find($id);
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$program.' found in program\'s table.'
            );
        }

        if (!$season) {
            throw $this->createNotFoundException(
                'No season with id : '.$season.' found in season\'s table.'
            );
        }

        $episodes= $season->getEpisodes();
        if (!$episodes) {
            throw $this->createNotFoundException(
                'There is no episode found in season\'s table.'
            );
        }

       return $this->render('program/season_show.html.twig', [
        'program' => $program,
        'season' => $season,
        'episode' => $episodes
       ]);
    }

    #[Route('/{program}/season/{season}/episode/{episode}', name:'episode_show')]
    public function showEpisode(Program $program, Season $season, Episode $episode): Response
    {
        
        // same as $program = $programRepository->find($id);
        if (!$program) {
            throw $this->createNotFoundException(
                'No program with id : '.$program.' found in program\'s table.'
            );
        }

        if (!$season) {
            throw $this->createNotFoundException(
                'No season with id : '.$season.' found in season\'s table.'
            );
        }

        
        if (!$episode) {
            throw $this->createNotFoundException(
                'There is no episode found in this table.'
            );
        }

       return $this->render('episode/show.html.twig', [
        'program' => $program,
        'season' => $season,
        'episode' => $episode
       ]);
    }
}
