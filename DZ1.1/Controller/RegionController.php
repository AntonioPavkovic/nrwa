<?php


class RegionController extends Controller
{
    public function index()
    {
        $regions = region::getAll();
        $data['regions'] = $regions;
        self::CreateView('RegionIndexView', $data);
    }

    public function create()
    {
        $regions = Region::getAll();
        $data['regions'] = $regions;
        self::CreateView('RegionAddView', $data);
    }


    public function store($request)
    {
        Region::save($request['region_id'], $request['region_name']);
        $this->index();
    }

    public function edit($request)
    {
        $region = Region::findById($request['region_id']);
        $data['region'] = $region;
        self::CreateView('RegionEditView', $data);
    }


    public function update($request)
    {
        Region::update($request['region_id'], $request['region_name']);
        $this->index();
    }

    public function delete($request)
    {
        Region::delete($request['region_id']);
        $this->index();
    }
}