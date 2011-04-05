<?php
// apps/frontend/modules/category/actions/actions.class.php
class categoryActions extends sfActions
{
  public function executeShow(sfWebRequest $request)
  {
      $this->category = $this->getRoute()->getObject();

      $this->pager = new sfDoctrinePager(
        'JobeetJob',
        sfConfig::get('app_max_jobs_on_category')
      );
      $this->pager->setQuery($this->category->getActiveJobsQuery());
      $this->pager->setPage($request->getParameter('page', 1));
      $this->pager->init();
  }
}