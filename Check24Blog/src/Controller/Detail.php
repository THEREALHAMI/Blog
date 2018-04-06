<?php
// TEXT ohne leerzeichen  = FEHLER
namespace Controller;

use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Check24Framework\ViewModel;
use factory\Entry;
use factory\Comment;

class Detail implements ControllerInterface
{
    /**
     * @param Request $request
     * @param \PDO $pdo
     * @return ViewModel
     */
    public function action(Request $request): ViewModel
    {
        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/start/detailseite.phtml');

        $blogId = $request->getFromQuery('ID');

        $entry = Entry::create();
        $entryData = $entry->getEntryById($blogId);

        $comment = Comment::create();
        $commentData = $comment->getCommentByBlogId($blogId);

            $viewModel->setTemplateVariables([
                'title' => $entryData[0]['titel'],
                'date' => $entryData[0]['date'],
                'text' => $entryData[0]['content'],
                'author' => $entryData[0]['author'],
                'commentData' => $commentData,
                'count' => count($commentData),
                'ID' => $blogId
            ]);
        return $viewModel;
    }
}