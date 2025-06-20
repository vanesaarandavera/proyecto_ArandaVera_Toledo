<div class="inicio-libros-tarjetas inicio-flex">
        <?php
        if ($producto) : ?>
            <?php foreach ($producto as $unproducto): ?>
                <?php $eliminado = $unproducto['eliminado']; ?>
                <?php if ($eliminado == '0'): ?>
                    <div class="card  inicio-libros-tarjetas-item">

                        <a href="<?php echo base_url('libro/' . $unproducto['id_producto']); ?>">
                            <?php if (!empty($unproducto['imagen']) && file_exists(FCPATH . 'assets/uploads/' . $unproducto['imagen'])): ?>
                                <img src="<?= base_url('assets/uploads/' . $unproducto['imagen']) ?>" class="card-img-top" alt="Imagen <?= esc($unproducto['nombre_prod']) ?>" width="100" class="img-thumb" />

                            <?php else: ?>
                                <span>No hay imagen</span>
                            <?php endif; ?>
                        </a>
                        <div class="card-body inicio-libros-item-body"> <?php if ($unproducto['stock'] > 0) { ?>
                                <h5 class=" inicio-libros-tarjetas-titulo"><?= esc($unproducto['nombre_prod']) ?></h5>
                                <p class="card-text inicio-libros-tarjetas-autor"><?= esc($unproducto['autor']) ?></p>
                                <p class="card-text inicio-libros-tarjetas-precio">Precio: $<?= number_format($unproducto['precio_vta'], 2) ?></p>

                                <?php echo form_open('carrito/add', ['class' => 'd-inline-block']); // d-inline-block para que el form no ocupe toda la línea
                                    echo form_hidden('id', $unproducto['id_producto']);
                                    echo form_hidden('precio_vta', $unproducto['precio_vta']);
                                    echo form_hidden('nombre_prod', $unproducto['nombre_prod']);
                                    echo form_hidden('imagen', $unproducto['imagen']);
                                    $btn = array(
                                        'class' => 'btn btn-comprar btn-primary',
                                        'value' => 'Agregar al Carrito',
                                        'name' => 'action'
                                    );
                                    echo form_submit($btn);
                                    echo form_close(); ?>
                            <?php } else { ?>
                                <p><span class="label label-danger">Sin Stock</span></p>
                            <?php } ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No hay productos disponibles.</p> <?php endif; ?>
    </div>
</div>