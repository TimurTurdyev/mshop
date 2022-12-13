<?php

namespace App\Http\Controllers;

class InfoController extends Controller
{
    public function about()
    {
        return view('store.info.about');
    }

    public function delivery()
    {
        return view('store.info.delivery', [
            'navs' => $this->getNavs()
        ]);
    }

    public function payment()
    {
        return view('store.info.payment', [
            'navs' => $this->getNavs()
        ]);
    }

    public function designers()
    {
        return view('store.info.designers', [
            'navs' => $this->getNavs()
        ]);
    }

    public function designProject()
    {
        return view('store.info.design-project', [
            'navs' => $this->getNavs()
        ]);
    }

    public function forGovernmentCustomers()
    {
        // Todo
        return view('store.info.for-government-customers', [
            'navs' => $this->getNavs(),
            'phone' => 'phone',
            'email' => 'email',
        ]);
    }

    private function getNavs()
    {
        return [
            [
                'link' => route('delivery'),
                'title' => 'Доставка и сборка',
                'active' => request()->is('delivery')
            ], [
                'link' => route('payment'),
                'title' => 'Оплата',
                'active' => request()->is('payment')
            ], [
                'link' => route('designers'),
                'title' => 'Дизайнерам и архитекторам',
                'active' => request()->is('designers')
            ], [
                'link' => route('design.project'),
                'title' => 'Дизайн-проект',
                'active' => request()->is('design-project')
            ], [
                'link' => route('for.government.customers'),
                'title' => 'Госзаказчикам',
                'active' => request()->is('for-government-customers')
            ],
        ];
    }
}
