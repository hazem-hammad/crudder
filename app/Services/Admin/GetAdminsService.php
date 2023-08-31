<?php

namespace App\Services\Admin;

use App\Enums\ActivationType;
use App\Enums\AdminTypes;
use App\Enums\Datatable;
use App\Foundation\Services\BaseService;
use App\Foundation\Services\General\Auth\GetAuthAdminService;
use App\Models\Admin\Admin;
use App\Foundation\Models\BaseModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\LazyCollection;
use Yajra\DataTables\QueryDataTable;

class GetAdminsService extends BaseService
{
    /**
     * GetAdminsService constructor
     * @param BaseModel $collection
     */
    public function __construct(private readonly BaseModel $collection = new Admin())
    {
    }

    /**
     * @return Collection
     */
    public function get(): Collection
    {
        return $this->query()->active()->get();
    }

    /**
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->collection->query();
    }

    /**
     * @return Builder
     */
    public function getForDataTable(): Builder
    {
        $admin = (new GetAuthAdminService())->get();
        return $this->query()->when(!$admin->primary_admin, function ($query) {
            $query->notPrimary();
        })->filter($this->filters)->with('roles:id,name')->limit(Datatable::PER_PAGE->value);
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return $this->collection
            ->active()
            ->notPrimary()
            ->count();
    }

    /**
     * @return int
     */
    public function assignedAdminTodayCount(): int
    {
        return 33;
    }

    /**
     * @return int
     */
    public function totalAssignedTicketsCount(): int
    {
        return 43;
    }

    /**
     * @return int
     */
    public function closedTicketCount(): int
    {
        return 432;
    }

    /**
     * @return int
     */
    public function openTicketCount(): int
    {
        return 65;
    }

    public function lastAssignedTicket()
    {
        return [];
    }

}
