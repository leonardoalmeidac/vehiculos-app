<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Vehiculo
 *
 * @ORM\Table(name="vehiculos")
 * @ORM\Entity
 */
class Vehiculo
{
    /**
     * @var int
     *
     * @ORM\Column(name="codigo", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $codigo;

    /**
     * @var string
     *
     * @ORM\Column(name="descripcion", type="string", length=200, nullable=false)
     */
    private $descripcion;

    /**
     * @var float
     *
     * @ORM\Column(name="precio", type="float", precision=10, scale=2, nullable=false)
     */
    private $precio;

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function getDescripcion(): ?string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    public function getPrecio(): ?float
    {
        return $this->precio;
    }

    public function setPrecio(float $precio): self
    {
        $this->precio = $precio;

        return $this;
    }


}
