<?php
namespace Sellastica\Project\Service;

class DeactivateProjectService
{
	/**
	 * @var string
	 */
	private $senderEmail;
	/**
	 * @var \Sellastica\Template\TemplateFactory
	 */
	private $templateFactory;
	/**
	 * @var \Nette\Localization\ITranslator
	 */
	private $translator;
	/**
	 * @var \Nette\Mail\IMailer
	 */
	private $mailer;


	/**
	 * @param string $senderEmail
	 * @param \Sellastica\Template\TemplateFactory $templateFactory
	 * @param \Nette\Localization\ITranslator $translator
	 * @param \Nette\Mail\IMailer $mailer
	 */
	public function __construct(
		string $senderEmail,
		\Sellastica\Template\TemplateFactory $templateFactory,
		\Nette\Localization\ITranslator $translator,
		\Nette\Mail\IMailer $mailer
	)
	{
		$this->senderEmail = $senderEmail;
		$this->templateFactory = $templateFactory;
		$this->translator = $translator;
		$this->mailer = $mailer;
	}

	/**
	 * @param \Sellastica\Project\Entity\Project $project
	 */
	public function execute(\Sellastica\Project\Entity\Project $project): void
	{
		$project->setActiveTill(new \DateTime('yesterday'));
		$this->notify($project);
	}

	/**
	 * @param \Sellastica\Project\Entity\Project $project
	 */
	private function notify(\Sellastica\Project\Entity\Project $project): void
	{
		$body = $this->templateFactory->create(__DIR__ . '/DeactivateProject.email.latte', [
			'layout' => __DIR__ . '/../../../integroid/src/UI/Emails/@layout_napojse.latte',
			'signature' => __DIR__ . '/../../../integroid/src/UI/Emails/signature.latte',
			'project' => $project,
		]);

		$message = new \Nette\Mail\Message();
		$message->setSubject($this->translator->translate('admin.emails.deactivate_project.subject', [
			'project' => $project->getShortTitle(),
		]));
		$message->setFrom($this->senderEmail);
		$message->addReplyTo($this->senderEmail);
		$message->setHtmlBody($body);
		$message->addTo($project->getEmail());

		$this->mailer->send($message);
	}
}