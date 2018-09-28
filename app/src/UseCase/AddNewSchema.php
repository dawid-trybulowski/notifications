<?php

namespace App\src\UseCase;


use App\src\Mapper\SchemaMapperInterface;
use Illuminate\Http\Request;

class AddNewSchema
{
    /**
     * @var SchemaMapperInterface
     */
    private $schemaMapper;

    public function __construct(SchemaMapperInterface $schemaMapper)
    {
        $this->schemaMapper = $schemaMapper;
    }

    public function process(Request $request)
    {
        $chemaEntity = $this->schemaMapper->map($request->post());
    }
}