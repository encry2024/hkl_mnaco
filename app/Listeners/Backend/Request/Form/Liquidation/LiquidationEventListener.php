<?php

namespace App\Listeners\Backend\Request\Form\Liquidation;

/**
* Class LiquidationEventListener.
*/
class LiquidationEventListener
{
   /**
   * @var string
   */
   private $history_slug = 'Liquidation';

   /**
   * @param $event
   */
   public function onCreated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->liquidation->id)
      ->withText('trans("history.backend.request.form.liquidation.created") <strong>{liquidation}</strong>')
      ->withIcon('plus')
      ->withClass('bg-green')
      ->withAssets([
         'liquidation_link' => ['admin.request.form.liquidation.show', $event->liquidation->project, $event->liquidation->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onUpdated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->liquidation->id)
      ->withText('trans("history.backend.request.form.liquidation.updated") <strong>{liquidation}</strong>')
      ->withIcon('save')
      ->withClass('bg-aqua')
      ->withAssets([
         'liquidation_link' => ['admin.request.form.liquidation.show', $event->liquidation->project, $event->liquidation->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onDeleted($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->liquidation->id)
      ->withText('trans("history.backend.request.form.liquidation.deleted") <strong>{liquidation}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'liquidation_link' => ['admin.request.form.liquidation.show', $event->liquidation->project, $event->liquidation->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onRestored($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->liquidation->id)
      ->withText('trans("history.backend.request.form.liquidation.restored") <strong>{liquidation}</strong>')
      ->withIcon('refresh')
      ->withClass('bg-aqua')
      ->withAssets([
         'liquidation_link' => ['admin.request.form.liquidation.show', $event->liquidation->project, $event->liquidation->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onPermanentlyDeleted($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->liquidation->id)
      ->withText('trans("history.backend.request.form.liquidation.permanently_deleted") <strong>{liquidation}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'asset_string' => $event->liquidation->project,
      ])
      ->log();

      history()->withType($this->history_slug)
      ->withEntity($event->liquidation->id)
      ->withAssets([
         'asset_string' => $event->liquidation->project,
      ])
      ->updateUserLinkLiquidations();
   }

   /**
   * Register the listeners for the subscriber.
   *
   * @param \Illuminate\Events\Dispatcher $events
   */
   public function subscribe($events)
   {
      $events->listen(
         \App\Events\Backend\Request\Form\Liquidation\LiquidationCreated::class,
         'App\Listeners\Backend\Request\Form\Liquidation\LiquidationEventListener@onCreated'
      );

      $events->listen(
         \App\Events\Backend\Request\Form\Liquidation\LiquidationUpdated::class,
         'App\Listeners\Backend\Request\Form\Liquidation\LiquidationEventListener@onUpdated'
      );

      $events->listen(
         \App\Events\Backend\Request\Form\Liquidation\LiquidationDeleted::class,
         'App\Listeners\Backend\Request\Form\Liquidation\LiquidationEventListener@onDeleted'
      );

      $events->listen(
         \App\Events\Backend\Request\Form\Liquidation\LiquidationRestored::class,
         'App\Listeners\Backend\Request\Form\Liquidation\LiquidationEventListener@onRestored'
      );

      $events->listen(
         \App\Events\Backend\Request\Form\Liquidation\LiquidationPermanentlyDeleted::class,
         'App\Listeners\Backend\Request\Form\Liquidation\LiquidationEventListener@onPermanentlyDeleted'
      );
   }
}
