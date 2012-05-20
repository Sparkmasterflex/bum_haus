<section class="clearfix">
  <aside>
    <h3>Want to Join Us?</h3>
    <form action="/includes/functions.php" method="POST" id="join-us">
      <label>Name:<br />
        <input type="text" name=name />
      </label>
      <label>Email:<br />
        <input type="email" name=email />
      </label>
      <label>Phone:<br />
        <input type="text" name=phone />
      </label>
      <label>Message:<br />
        <textarea name=message placeholder="I'm looking forward to a game at..."></textarea>
      </label>
      <input type="hidden" value="true" name="join-us" />
      <input type="submit" value="Send" />
    </form>
  </aside>
  <h3>Upcoming Events</h3>
  <ul id="upcoming-events">
    <li>
      <div class="img-container">
        <img src="/images/events/wanna-play.jpg" alt="Wanna Play Party" title="Wanna Play Party" />
      </div>
      <time datetime="2012-05-06">May 6, 2012</time>
      Wanna Play Party
      <address>Dillsburg, PA</address>
    </li>
  </ul>
  <h3>Past Events</h3>
  <ul id="past-events">
    <li>
      <div class="img-container">
        <img src="/images/events/skirmish_vii.jpg" alt="Stalingrad VII" title="Stalingrad VII" />
      </div>
      <time datetime="2012-03-10">March 10, 2012</time>
      Stalingrad VII
      <address>Albrightsville, PA</address>
    </li>
    <li>
      <div class="img-container">
        <img src="/images/events/skirmish_vi.jpg" alt="Stalingrad VI" title="Stalingrad VI" />
      </div>
      <time datetime="2012-03-10">March 12, 2011</time>
      Stalingrad VI
      <address>Albrightsville, PA</address>
    </li>
  </ul>
</section>
