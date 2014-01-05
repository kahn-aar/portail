<?php use_helper('Thumb') ?>
<table>
  <tbody>
    <tr>
      <th>Evènement:</th>
      <td><?php echo EventTable::getInstance()->find($galerie_photo->getEventId())?></td>
    </tr>
    <tr>
      <th>Titre:</th>
      <td><?php echo $galerie_photo->getTitle() ?></td>
    </tr>
    <tr>
      <th>Description:</th>
      <td><?php echo $galerie_photo->getDescription() ?></td>
    </tr>
  </tbody>
</table>

<?php if($sf_user->isAuthenticated()
   && $sf_user->getGuardUser()->hasAccess(EventTable::getInstance()->find($galerie_photo->getEventId())->getAsso()->getLogin(), 0x200)): ?>
<a class="btn btn-primary" href="<?php echo url_for('galerie/edit?id='.$galerie_photo->getId()) ?>">Editer la galerie</a>
&nbsp;
  <a class="btn btn-primary" href="<?php echo url_for('photo_new', $galerie_photo) ?>">Ajouter des photos</a>
<?php endif ?>

<hr />
<div class="row-fluid">
  <ul class="thumbnails thumbfix">
    <?php if($sf_user->isAuthenticated()) : ?>
      <?php foreach ($photos as $photo) : ?>
        <li class="span3">
          <a class="thumbnail"  href="<?php echo url_for('photo/show?id='.$photo->getId()) ?>">
            <?php echo showThumb($photo->getImage(), 'galeries', array(
            'width' => 250,
            'height' => 250), 
            'center') ?> 
          </a>
        </li>     
      <?php  endforeach; ?>
    <?php else: ?>
      <?php foreach ($photos_public as $photo_public) : ?>
        <li class="span3">
          <a class="thumbnail"  href="<?php echo url_for('photo/show?id='.$photo_public->getId()) ?>">
            <?php echo showThumb($photo_public->getImage(), 'galeries', array(
            'width' => 250,
            'height' => 250), 
            'center') ?> 
          </a>
        </li>     
      <?php  endforeach; ?>
    <?php  endif; ?>      
  </ul>
</div>


