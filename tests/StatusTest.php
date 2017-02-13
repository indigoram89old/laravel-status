<?php

namespace Indigoram89\Status\Test;

use Indigoram89\Status\Status;
use Indigoram89\Status\Created;
use Indigoram89\Status\Updated;

class StatusTest extends TestCase
{
    /** @test */
    public function get_currencies()
    {
        $statuses = Status::get();

        $this->assertCount(0, $statuses);

        (new Created)->fetch();
        (new Updated)->fetch();
        (new Created)->fetch();
        (new Updated)->fetch();

        $statuses = Status::get();

        $this->assertCount(2, $statuses);
    }

    /** @test */
    public function instance_of()
    {
        (new Created)->fetch();
        (new Updated)->fetch();

        $statuses = Status::get();

        $this->assertInstanceOf(Created::class, $statuses->first());
        $this->assertInstanceOf(Updated::class, $statuses->last());
    }

    /** @test */
    public function attributes()
    {
        $status = (new Created)->fetch();

        $this->assertEquals('created', $status->label);
    }

    /** @test */
    public function relations()
    {
        $status = (new Created)->fetch();

        $model = TestModel::create([
            'name' => 'Test model', 'status_id' => $status->id,
        ]);

        $this->assertInstanceOf(Created::class, $status);
    }
}
