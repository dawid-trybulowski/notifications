<?php

namespace App\Providers;

use App\src\Command\AddEmailToHistoryCommand;
use App\src\Extractor\EmailExtractor;
use App\src\Gateway\EmailHistoryGateway;
use App\src\Gateway\EmailSendGateway;
use App\src\Hydrator\EmailHydrator;
use App\src\Mapper\EmailMapper;
use App\src\Repository\EmailHistoryRepository;
use App\src\Repository\EmailHistoryRepositoryInterface;
use App\src\Repository\EmailSendRepository;
use App\src\Response\EmailHistoryResponse;
use App\src\Response\EmailSendResponse;
use App\src\Service\EmailService;
use App\src\UseCase\EmailHistory;
use App\src\UseCase\EmailSend;
use App\src\UseCase\GetEmailFromHistory;
use Illuminate\Support\ServiceProvider;

class EmailProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EmailSendRepository::class, function ($app) {
            return new EmailSendRepository(new EmailSendGateway, new EmailSendResponse());
        });

        $this->app->bind(EmailService::class, function ($app) {
            return new EmailService(new EmailHydrator(), $app->make(EmailSendRepository::class));
        });

        $this->app->bind(EmailSend::class, function ($app) {
            return new EmailSend(new EmailMapper(), $app->make(EmailService::class), new EmailSendResponse, $app->make(AddEmailToHistoryCommand::class));
        });

        $this->app->bind(EmailHistoryRepository::class, function ($app) {
            return new EmailHistoryRepository(new EmailHistoryGateway());
        });

        $this->app->bind(AddEmailToHistoryCommand::class, function ($app) {
            return new AddEmailToHistoryCommand($app->make(EmailHistoryRepository::class), new EmailExtractor());
        });

        $this->app->bind(EmailHistoryRepository::class, function ($app) {
            return new EmailHistoryRepository(new EmailHistoryGateway());
        });

        $this->app->bind(EmailHistory::class, function ($app) {
            return new EmailHistory($app->make(EmailHistoryRepository::class), $app->make(EmailService::class), new EmailHistoryResponse());
        });

        $this->app->bind(GetEmailFromHistory::class, function ($app) {
            return new GetEmailFromHistory($app->make(EmailHistoryRepository::class), new EmailHistoryResponse(), $app->make(EmailService::class));
        });
    }
}
