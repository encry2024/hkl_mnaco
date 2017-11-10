<?php

namespace App\Listeners\Backend\Management\Customer;

/**
* Class CustomerEventListener.
*/
class CustomerEventListener
{
   /**
   * @var string
   */
   private $history_slug = 'Customer';

   /**
   * @param $event
   */
   public function onCreated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->customer->id)
      ->withText('trans("history.backend.management.customer.created") <strong>{customer}</strong>')
      ->withIcon('plus')
      ->withClass('bg-green')
      ->withAssets([
         'asset_link' => ['admin.management.customer.show', $event->customer->name, $event->customer->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onUpdated($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->customer->id)
      ->withText('trans("history.backend.management.customer.updated") <strong>{customer}</strong>')
      ->withIcon('save')
      ->withClass('bg-aqua')
      ->withAssets([
         'asset_link' => ['admin.management.customer.show', $event->customer->name, $event->customer->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onDeleted($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->customer->id)
      ->withText('trans("history.backend.management.customer.deleted") <strong>{customer}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'asset_link' => ['admin.management.customer.show', $event->customer->name, $event->customer->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onRestored($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->customer->id)
      ->withText('trans("history.backend.management.customer.restored") <strong>{customer}</strong>')
      ->withIcon('refresh')
      ->withClass('bg-aqua')
      ->withAssets([
         'asset_link' => ['admin.management.customer.show', $event->customer->name, $event->customer->id],
      ])
      ->log();
   }

   /**
   * @param $event
   */
   public function onPermanentlyDeleted($event)
   {
      history()->withType($this->history_slug)
      ->withEntity($event->customer->id)
      ->withText('trans("history.backend.management.customer.permanently_deleted") <strong>{customer}</strong>')
      ->withIcon('trash')
      ->withClass('bg-maroon')
      ->withAssets([
         'asset_string' => $event->customer->name,
      ])
      ->log();

      history()->withType($this->history_slug)
      ->withEntity($event->customer->id)
      ->withAssets([
         'asset_string' => $event->customer->name,
      ])
      ->updateUserLinkAssets();
   }

   /**
   * Register the listeners for the subscriber.
   *
   * @param \Illuminate\Events\Dispatcher $events
   */
   public function subscribe($events)
   {
      $events->listen(
         \App\Events\Backend\Management\Customer\CustomerCreated::class,
         'App\Listeners\Backend\Management\Customer\CustomerEventListener@onCreated'
      );

      $events->listen(
         \App\Events\Backend\Management\Customer\CustomerUpdated::class,
         'App\Listeners\Backend\Management\Customer\CustomerEventListener@onUpdated'
      );

      $events->listen(
         \App\Events\Backend\Management\Customer\CustomerDeleted::class,
         'App\Listeners\Backend\Management\Customer\CustomerEventListener@onDeleted'
      );

      $events->listen(
         \App\Events\Backend\Management\Customer\CustomerRestored::class,
         'App\Listeners\Backend\Management\Customer\CustomerEventListener@onRestored'
      );

      $events->listen(
         \App\Events\Backend\Management\Customer\CustomerPermanentlyDeleted::class,
         'App\Listeners\Backend\Management\Customer\CustomerEventListener@onPermanentlyDeleted'
      );
   }
}
