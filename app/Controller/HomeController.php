<?php

class HomeController extends AppController {

    /** @var array Declares the models this controller uses. */
    public $uses = array('Home', 'Widget', 'Style');

    /** @var array Declares the components this controller uses. */
    public $components = array('RequestHandler');

    /**
     * Displays the client facing home.
     */
    public function index() {
        $result = $this->Home->findById($this->client_id);
        $home = $result['Home'];
        $portals = $result['Widget'];
        $style = $result['Style'];

        $layout = array(
            'header' => array(
                'element' => 'layout/header_center',
                'style' => array(
                    'background' => array(
                        'color' => '@brand-primary',
                        'gradient' => array(
                            'start_color' => '@brand-primary',
                            'end_color' => 'darken(@brand-primary, 10%)',
                            'start_pos' => '0%',
                            'end_pos' => '100%'
                        ),
                        'image' => array(
                            'src' => 'upload/bg.png',
                            'repeat' => 'repeat-x',
                            'position' => 'center'
                        )
                    )
                ),
                'widgets' => array(
                    array(
                        'element' => 'widget/image',
                        'params' => array(
                            'image_pos' => '',
                            'image_style' => '',
                            'image_src' => 'logo.png',
                            'image_alt' => 'AURA Site Builder'
                        )
                    ),
                    array(
                        'element' => 'widget/image',
                        'params' => array(
                            'image_pos' => '',
                            'image_style' => '',
                            'image_src' => 'logo-black.png',
                            'image_alt' => 'Bang'
                        )
                    )
                )
            ),
            'nav' => array(
                'element' => 'layout/navigation_basic',
                'style' => array(
                    'class' => 'navbar-collapse'
                ),
                'widgets' => array(
                    array(
                        'element' => 'widget/navigation',
                        'params' => array(
                            'links' => array(
                                'Home' => 'home',
                                'Samples' => 'samples',
                                'Services' => 'services'
                            )
                        )
                    )
                )
            )
        );

        $this->set(compact('home', 'portals', 'style', 'layout'));
    }

    /**
     * Lists admin editing options.
     */
    public function admin_index() {
        $this->index(); // uses same objects
    }

    /**
     * Responds to admin/edit and conditionally handles the request.
     * It will either edit the home cover or portal widgets.
     * @param string $section The section to edit. At this stage, this would either by null or 'portal'.
     * @param int $id The id of the section to edit if required.
     */
    public function admin_edit($section = null, $id = 1) {
        // No section parameter given. By design, this defaults to editing the cover image.
        if (is_null($section)) {
            $this->admin_edit_cover();
            return;
        }

        // Edit one of the portal widgets
        if ($section == 'portal') {
            $this->admin_edit_portal($id);
            return;
        }

        // A bad section parameter was given - just redirect to the admin home index
        $this->redirect(array('controller' => 'home', 'action' => 'index'));
    }

    /**
     * Edits the home cover.
     */
    private function admin_edit_cover() {
        // The user is submitting changes:
        if ($this->request->is('put')) {
            if ($this->Home->save($this->request->data)) {
                $this->Session->setFlash('Home cover has been successfully updated.', 'notify_success');
                $this->redirect(array('controller' => 'home', 'action' => 'index'));
            } else {
                $this->Session->setFlash('There was an error saving changes made to the home cover.', 'notify_warn');
            }
        }

        // Provide agent model snapshot:
        $this->data = $this->Home->findById($this->client_id);

        // Expose select options
        $this->set('well_bg_options', $this->Home->wellBgOptions);
    }

    /**
     * Edits the specified portal.
     * @param int $id The pk of of the portal to edit.
     */
    private function admin_edit_portal($id) {
        // The user is submitting changes:
        if ($this->request->is('post')) { // cake seems to use post on this form, probably because widget is not true to the controller
            if ($this->Widget->save($this->request->data)) {
                $this->Session->setFlash(sprintf('Portal #%s has been successfully updated.', $id), 'notify_success');
                $this->redirect(array('controller' => 'home', 'action' => 'index'));
            } else {
                $this->Session->setFlash(sprintf('There was an error saving changes made to portal #%s.', $id), 'notify_warn');
            }
        }

        // Provide agent model snapshot:
        $this->data = $this->Widget->findById($id);
        if (count($this->data) == 0) {
            $this->Session->setFlash(sprintf('Unable to locate portal with id #%s.', $id), 'notify_warn');
            $this->redirect(array('controller' => 'home', 'action' => 'index'));
        } else {
            $this->render('admin_edit_portal');
        }
    }

}
