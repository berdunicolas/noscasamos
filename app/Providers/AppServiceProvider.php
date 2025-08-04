<?php

namespace App\Providers;

use App\View\Components\Admin\Layout;
use App\View\Components\Admin\NavBar;
use App\View\Components\Admin\Sellers\NewSellerModal;
use App\View\Components\Admin\Users\NewUserModal;
use App\View\Components\Form\Button;
use App\View\Components\Form\ColorPicker;
use App\View\Components\Form\Input;
use App\View\Components\Form\InputGroup;
use App\View\Components\Form\Select;
use App\View\Components\Form\SelectOption;
use App\View\Components\Form\UploadZone;
use App\View\Components\Modules\FootModule;
use App\View\Components\Table\ConfirmCloneModal;
use App\View\Components\Table\ConfirmDeleteModal;
use App\View\Components\Table\Invitations;
use App\View\Components\Table\NewInvitationModal;
use App\View\Components\Table\NewTemplateModal;
use App\View\Components\Table\Sellers;
use App\View\Components\Table\Templates;
use App\View\Components\Table\Users;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::component('admin.layout', Layout::class);

        Blade::component('form.input', Input::class);
        Blade::component('form.input-group', InputGroup::class);
        Blade::component('form.select', Select::class);
        Blade::component('form.select-option', SelectOption::class);
        Blade::component('form.button', Button::class);
        Blade::component('form.color-picker', ColorPicker::class);
        Blade::component('form.upload-zone', UploadZone::class);

        Blade::component('admin.nav-bar', NavBar::class);
        Blade::component('admin.users.new-user-modal', NewUserModal::class);
        Blade::component('table.users', Users::class);
        
        Blade::component('admin.sellers.new-seller-modal', NewSellerModal::class);
        Blade::component('table.sellers', Sellers::class);

        Blade::component('table.invitations', Invitations::class);
        Blade::component('admin.invitations.new-invitation-modal', NewInvitationModal::class);
        Blade::component('admin.invitations.confirm-delete-modal', ConfirmDeleteModal::class);
        Blade::component('admin.invitations.confirm-clone-modal', ConfirmCloneModal::class);

        Blade::component('table.templates', Templates::class);
        Blade::component('admin.templates.new-template-modal', NewTemplateModal::class);

        Blade::component('module-forms.form', \App\View\Components\ModuleForms\Form::class);

        Blade::component('module-foot', FootModule::class);
    }
}