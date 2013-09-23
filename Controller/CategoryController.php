<?php

/*
 * This file is part of the CCDNForum ForumBundle
 *
 * (c) CCDN (c) CodeConsortium <http://www.codeconsortium.com/>
 *
 * Available on github <http://www.github.com/codeconsortium/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CCDNForum\ForumBundle\Controller;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 *
 * @author Reece Fowell <reece@codeconsortium.com>
 * @version 1.0
 */
class CategoryController extends BaseController
{

    /**
     *
     * @access public
     * @return RenderResponse
     */
    public function indexAction()
    {
        $categories = $this->filterViewableCategories($this->container->get('ccdn_forum_forum.repository.category')->findAllJoinedToBoard());

        $topicsPerPage = $this->container->getParameter('ccdn_forum_forum.board.show.topics_per_page');

        $crumbs = $this->container->get('ccdn_component_crumb.trail')
            ->add($this->container->get('translator')->trans('ccdn_forum_forum.crumbs.forum_index', array(), 'CCDNForumForumBundle'), $this->container->get('router')->generate('ccdn_forum_forum_category_index'), "home");

        return $this->container->get('templating')->renderResponse('CCDNForumForumBundle:Category:index.html.' . $this->getEngine(), array(
            'crumbs' => $crumbs,
            'categories' => $categories,
            'topics_per_page' => $topicsPerPage,
        ));
    }

    /**
     *
     * @access public
     * @param int $categoryId
     * @return RenderResponse
     */
    public function showAction($categoryId)
    {
        $categories = $this->filterViewableCategories(array($this->container->get('ccdn_forum_forum.repository.category')->findOneByIdJoinedToBoard($categoryId)));
		
        if (! $categories[0]) {
            throw NotFoundhttpException('No such category exists!');
        }

        $topicsPerPage = $this->container->getParameter('ccdn_forum_forum.board.show.topics_per_page');

        $crumbs = $this->container->get('ccdn_component_crumb.trail')
            ->add($this->container->get('translator')->trans('ccdn_forum_forum.crumbs.forum_index', array(), 'CCDNForumForumBundle'), $this->container->get('router')->generate('ccdn_forum_forum_category_index'), "home")
            ->add($categories[0]->getName(), $this->container->get('router')->generate('ccdn_forum_forum_category_show', array('categoryId' => $categoryId)), "category");

        return $this->container->get('templating')->renderResponse('CCDNForumForumBundle:Category:show.html.' . $this->getEngine(), array(
            'crumbs' => $crumbs,
            'categories' => $categories,
            'topics_per_page' => $topicsPerPage,
        ));
    }
}
