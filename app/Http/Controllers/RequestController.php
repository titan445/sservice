<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Request as Item;

class RequestController extends Controller
{
    // в теле запроса возвращаем список id заявок и тем
    /**
    * @OA\Get(
    *     path="/api/show_requests_list/{user}",
    *     summary="Запрос списка заявок",
    *     tags={"requests"},
   *  @OA\Parameter(
     *         name="user",
     *         in="path",
     *         description="user id",
     *         required=true,
     *     ),
    *     @OA\Response(
    *         response=200,
    *         description="successful operation",
    
    *         @OA\JsonContent(
    *             type="array",
    *             @OA\Items(
    *                            @OA\Property(
    *                                        property="id",
    *                                        type="string"
    *                                       ),
    *                            @OA\Property(
    *                                        property="name",
    *                                        type="string"
    *                                       ),
    *                      )
    *         ),
    *     )
    * )
    */
    public function show_requests_list(Request $request, User $user)
    {
        return $user->show_requests();
    }
    // возвращаем в теле запроса данные по заявке и все комментарии
      /**
    * @OA\Get(
    *     path="/api/show_request/{item}",
    *     summary="Запрос заявки",
    *     tags={"requests"},
   *  @OA\Parameter(
     *         name="item",
     *         in="path",
     *         description="request id",
     *         required=true,
     *     ),
    *     @OA\Response(
    *         response=200,
    *         description="successful operation",
    
    *         @OA\JsonContent(
    *             type="object",
    *                            @OA\Property(
    *                                        property="admin",
    *                                        type="string"
    *                                       ),
    *                            @OA\Property(
    *                                        property="user",
    *                                        type="string"
    *                                       ),
    *                            @OA\Property(
    *                                        property="name",
    *                                        type="string"
    *                                       ),
    *                            @OA\Property(
    *                                        property="description",
    *                                        type="string"
    *                                       ),
    *                            @OA\Property(
    *                                        property="is_closed",
    *                                        type="boolean"
    *                                       ),
    *                            @OA\Property(
    *                                        property="comments",
    *                                        type="array",
                            *                   @OA\Items(
                            *                            @OA\Property(
                            *                                        property="id",
                            *                                        type="string"
                            *                                       ),
                            *                            @OA\Property(
                            *                                        property="name",
                            *                                        type="string"
                            *                                       ),
                            *                      )
    *                                       ),

    *         ),
    *     )
    * )
    */
    public function show_request(Request $request, Item $item)
    {
        return $item->get_request();
    }
    // создание новой заявки
    /**
    * @OA\Post(
    *     path="/api/create_request/{user}",
    *     summary="создание новой заявки",
    *     tags={"requests"},
   *  @OA\Parameter(
     *         name="user",
     *         in="path",
     *         description="user id",
     *         required=true,
     *     ),
     *  @OA\RequestBody(
    *         @OA\JsonContent(
    *             type="object",
    *                            @OA\Property(
    *                                        property="name",
    *                                        type="string"
    *                                       ),
    *                            @OA\Property(
    *                                        property="description",
    *                                        type="string"
    *                                       ),
    *         ),
     * ),
    *     @OA\Response(
    *         response=200,
    *         description="successful operation",
    *     )
    * )
    */
    public function create_request(Request $request, User $user)
    {
        $item = new Item;
        $item->set_data($request, $user);
        $item->save();
        return response()->json(['success' => 'success'], 200);
    }
    // добавление комментария
        /**
    * @OA\Post(
    *     path="/api/add_comment/{item}/{user}",
    *     summary="добавление комментария",
    *     tags={"requests"},
   *  @OA\Parameter(
     *         name="user",
     *         in="path",
     *         description="user id",
     *         required=true,
     *     ),
     *     @OA\Parameter(
     *         name="item",
     *         in="path",
     *         description="request id",
     *         required=true,
     *     ),
     *  @OA\RequestBody(
    *         @OA\JsonContent(
    *             type="object",
    *                            @OA\Property(
    *                                        property="text",
    *                                        type="string"
    *                                       ),
    *         ),
     * ),
    *     @OA\Response(
    *         response=200,
    *         description="successful operation",
    *     )
    * )
    */
    public function add_comment(Request $request, Item $item, User $user)
    {
        $item->add_comment($request, $user);
        return response()->json(['success' => 'success'], 200);
    }
    // закрытие заявки
            /**
    * @OA\Post(
    *     path="/api/add_comment/{item}",
    *     summary="закрытие заявки",
    *     tags={"requests"},
     *     @OA\Parameter(
     *         name="item",
     *         in="path",
     *         description="request id",
     *         required=true,
     *     ),
    *     @OA\Response(
    *         response=200,
    *         description="successful operation",
    *     )
    * )
    */
    public function close_request(Request $request, Item $item)
    {
        $item->close();
        $item->save();
        return response()->json(['success' => 'success'], 200);
    }
}
