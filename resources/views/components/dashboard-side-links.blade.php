<nav class="list-none w-2/12 mx-auto mt-10 font-medium ml-12">
  <li>
      <a href="{{ route('profiles.show', auth()->user()->profile->id) }}" class="text-gray-600 hover:underline cursor-pointer block border rounded-md px-3 py-2">
          Profile
      </a>
  </li>
  <li class="mt-4">
      <a href="{{ route('categories.index') }}" class="text-gray-600 hover:underline cursor-pointer block border rounded-md px-3 py-2">
          Categories
      </a>
  </li>
  <li class="mt-4">
      <a href="{{ route('posts.index') }}" class="text-gray-600 hover:underline cursor-pointer block border rounded-md px-3 py-2">
          Posts
      </a>
  </li>
  <li class="mt-4">
      <a href="{{ route('comments.index') }}" class="text-gray-600 hover:underline cursor-pointer block border rounded-md px-3 py-2">
          Comments
      </a>
  </li>
</nav>